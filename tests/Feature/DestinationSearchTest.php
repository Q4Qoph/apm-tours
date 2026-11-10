<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class DestinationSearchTest extends TestCase
{
    public function test_unfiltered_page_lists_the_existing_destination_highlights(): void
    {
        $this->get('/destination')->assertOk()->assertSee('10 destination highlights')
            ->assertSee('Maasai Mara')->assertSee('Amboseli')->assertSee('East Africa');
    }

    public function test_search_matches_names_and_descriptions_case_insensitively_in_both_views(): void
    {
        $this->get('/destination?q=mArA')->assertOk()->assertSee('1 destination highlight')
            ->assertViewHas('destinationHighlights', fn ($items) => count($items) === 1 && $items[0]['name'] === 'Maasai Mara')
            ->assertSee('value="mArA"', false)->assertDontSee('>Amboseli<', false);
        $this->get('/destination?q=flamingo')->assertOk()->assertSee('No matching destinations');
        $this->get('/destination?q=Kilimanjaro')->assertOk()
            ->assertViewHas('destinationHighlights', fn ($items) => count($items) === 1 && $items[0]['name'] === 'Amboseli');
    }

    public function test_no_results_has_clear_and_contact_paths_and_escapes_the_query(): void
    {
        $this->get('/destination?'.http_build_query(['q' => '<script>unmatched</script>']))->assertOk()
            ->assertSee('0 destination highlights')->assertSee('No matching destinations')
            ->assertSee('Clear search')->assertSee('Discuss your trip')
            ->assertDontSee('<script>unmatched</script>', false);
    }

    public function test_regions_filter_existing_highlights_without_inventing_packages(): void
    {
        foreach (['Uganda', 'Tanzania', 'Zanzibar'] as $region) {
            $this->get('/destination?'.http_build_query(['region' => $region]))->assertOk()
                ->assertViewHas('destinationHighlights', fn ($items) => count($items) === 1 && $items[0]['name'] === 'East Africa');
        }
        $this->get('/destination?region=Kenya')->assertOk()->assertSee('10 destination highlights');
    }

    public function test_trip_finder_uses_four_regions_fourteen_days_and_a_local_get_search(): void
    {
        $html = $this->get('/')->assertOk()->getContent();
        preg_match('~<form[^>]*class="booking-form style8".*?</form>~s', $html, $match);
        $form = $match[0];
        $this->assertStringContainsString('action="'.route('destinations').'" method="GET"', $form);
        foreach (['Kenya', 'Uganda', 'Tanzania', 'Zanzibar'] as $region) {
            $this->assertStringContainsString('<option value="'.$region.'">'.$region.'</option>', $form);
        }
        $this->assertStringContainsString('<option value="14">14 days</option>', $form);
        $this->assertStringContainsString('<option value="1">1 day</option>', $form);
        $this->assertStringNotContainsString('Australia', $form);
        $this->assertStringNotContainsString('ajax-contact', $form);
        $this->assertStringNotContainsString('mail.php', $form);
    }

    public function test_result_links_carry_planning_preferences_into_the_enquiry(): void
    {
        $this->get('/destination?region=Uganda&travel_style=Family+Tour&duration=14')->assertOk()
            ->assertSee('These preferences help us plan your enquiry; they do not confirm availability.')
            ->assertSee('place=East%20Africa', false)
            ->assertSee('duration=14', false);
        $this->get('/contact?region=Uganda&place=East+Africa&travel_style=Family+Tour&duration=14')->assertOk()
            ->assertSee('Destination: East Africa')->assertSee('Region: Uganda')
            ->assertSee('Travel style: Family Tour')->assertSee('Preferred duration: 14 days');
    }

    public function test_untrusted_filters_are_rejected(): void
    {
        $this->get('/destination?region=Australia')->assertRedirect(route('destinations'))->assertSessionHasErrors('region');
        $this->get('/destination?duration=15')->assertRedirect(route('destinations'))->assertSessionHasErrors('duration');
        $this->get('/destination?q[]=array')->assertRedirect(route('destinations'))->assertSessionHasErrors('q');
        $this->get('/contact?place=Unlisted')->assertRedirect(route('contact'))->assertSessionHasErrors('place');
        $this->get('/contact?duration=0')->assertRedirect(route('contact'))->assertSessionHasErrors('duration');
    }
}
