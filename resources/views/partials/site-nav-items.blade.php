<li><a href="{{ route('home') }}" class="{{ request()->routeIs('home*') ? 'active' : '' }}">Home</a></li>
<li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About Us</a></li>
<li><a href="{{ route('destinations') }}" class="{{ request()->routeIs('destinations*') ? 'active' : '' }}">Destination</a></li>
<li><a href="{{ route('services') }}" class="{{ request()->routeIs('services', 'service.details') ? 'active' : '' }}">Service</a></li>
<li><a href="{{ route('blog') }}" class="{{ request()->routeIs('blog*') ? 'active' : '' }}">Blog</a></li>
<li><a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a></li>
<li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
