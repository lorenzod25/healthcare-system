<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- HealthPro+ Branding -->
                <a href="{{ route('home') }}" class="text-xl font-semibold text-blue-600 tracking-tight hover:text-blue-800 transition">
    HealthPro+
</a>



                <!-- Navigation Links (Desktop) -->
                @unless(request()->routeIs('welcome'))
                    <div class="hidden sm:flex space-x-8 sm:ms-10">
                        <x-nav-link :href="route('patients.index')" :active="request()->routeIs('patients.*')">Patients</x-nav-link>
                        <x-nav-link :href="route('providers.index')" :active="request()->routeIs('providers.*')">Providers</x-nav-link>
                        <x-nav-link :href="route('appointments.index')" :active="request()->routeIs('appointments.*')">Appointments</x-nav-link>
                        <x-nav-link :href="route('medical-records.index')" :active="request()->routeIs('medical-records.*')">Medical Records</x-nav-link>
                        <x-nav-link :href="route('prescriptions.index')" :active="request()->routeIs('prescriptions.*')">Prescriptions</x-nav-link>
                        <x-nav-link :href="route('billings.index')" :active="request()->routeIs('billings.*')">Billing</x-nav-link>
                    </div>
                @endunless
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger for Mobile -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="sm:hidden">
        @unless(request()->routeIs('welcome'))
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('patients.index')" :active="request()->routeIs('patients.*')">Patients</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('providers.index')" :active="request()->routeIs('providers.*')">Providers</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('appointments.index')" :active="request()->routeIs('appointments.*')">Appointments</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('medical-records.index')" :active="request()->routeIs('medical-records.*')">Medical Records</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('prescriptions.index')" :active="request()->routeIs('prescriptions.*')">Prescriptions</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('billings.index')" :active="request()->routeIs('billings.*')">Billing</x-responsive-nav-link>
            </div>
        @endunless

        <!-- Responsive User Info -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">Profile</x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
