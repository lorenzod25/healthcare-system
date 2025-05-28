<x-app-layout>
    <x-slot name="header">
        <div class="relative px-6 sm:px-12 text-center bg-gradient-to-r from-blue-50 to-cyan-50 pt-10 pb-6">
            <div class="max-w-5xl mx-auto">
                @if ($visited)
                    <h2 class="text-4xl font-extrabold text-green-700 mb-4">
                        👋 Welcome back to <span class="text-blue-600">HealthPro+</span>
                    </h2>
                    <p class="text-xl text-gray-700 mb-6">
                        Access your tools, data, and insights with ease.
                    </p>
                @else
                    <h2 class="text-4xl font-extrabold text-blue-700 mb-4">
                        🎉 First time using <span class="text-blue-600">HealthPro+</span>?
                    </h2>
                    <p class="text-xl text-gray-700 mb-6">
                        A cookie has been set for your session. Click below to begin.
                    </p>
                @endif

                <p class="text-2xl sm:text-3xl font-bold text-gray-800 leading-snug">
                    HealthPro+ is your centralized platform for streamlined healthcare management. Access patient data, coordinate appointments, review records, and manage billing — all in one intuitive and secure environment.
                </p>
            </div>

            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-cyan-100 via-transparent to-transparent opacity-30 -z-10"></div>
        </div>
    </x-slot>

    <div class="flex flex-col min-h-screen bg-white">
        <main class="flex-grow py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="mb-20">
                    <a href="{{ route('dashboard') }}"
                       class="mt-8 inline-block bg-blue-600 hover:bg-blue-700 text-white text-lg font-semibold px-8 py-4 rounded-xl transition">
                        Go to Dashboard
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 place-items-center">
                    <x-dashboard-card title="Patients" text="Records & data" route="patients.index" icon="🏥" color="text-black"/>
                    <x-dashboard-card title="Providers" text="Doctors & nurses" route="providers.index" icon="🩺" color="text-indigo-600"/>
                    <x-dashboard-card title="Appointments" text="Schedules & visits" route="appointments.index" icon="📅" color="text-green-600"/>
                    <x-dashboard-card title="Medical Records" text="Diagnostics & notes" route="medical-records.index" icon="📋" color="text-pink-600"/>
                    <x-dashboard-card title="Prescriptions" text="Track & manage" route="prescriptions.index" icon="💊" color="text-purple-600"/>
                    <x-dashboard-card title="Billing" text="Invoices & payments" route="billings.index" icon="💳" color="text-red-600"/>
                </div>
            </div>
        </main>

        <footer class="text-center py-6 text-sm text-gray-400 border-t">
            © {{ date('Y') }} HealthPro+. All rights reserved.
        </footer>
    </div>
</x-app-layout>
