<nav class="bg-[#0E0E0E] p-4 w-full">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                
                <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                     
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0">
                    <a href="/">
                    <img src="{{ asset('img/logo-blanco.png') }}" alt="Logo" class="h-6 sm:h-9 object-contain">
                </a>
                </div>
                <div class="hidden sm:block sm:ml-6 w-full">
                    <div class="flex justify-center space-x-4 w-full">

                        <a href="{{ route('home') }}" class="flex items-center px-3 py-2 mx-3 mt-2 text-gray-200 hover:text-gray-700 transition-colors duration-300 transform rounded-md lg:mt-0 hover:bg-gray-100 hover:rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home w-6 h-6 mr-2 stroke-current hover:stroke-gray-600"
                        viewBox="0 0 24 24" stroke="#CCCCCC"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                        </svg>Home</a>

                        <a href="{{ route('users.index') }}" class="flex items-center px-3 py-2 mx-3 mt-2 text-gray-200 hover:text-gray-700 transition-colors duration-300 transform rounded-md lg:mt-0 hover:bg-gray-100 hover:rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book w-8 h-8 mr-2 stroke-current hover:stroke-gray-600" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor" 
                        class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>Users</a>

                        <a href="{{ route('courses.index') }}" class="flex items-center px-3 py-2 mx-3 mt-2 text-gray-200 hover:text-gray-700 transition-colors duration-300 transform rounded-md lg:mt-0 hover:bg-gray-100 hover:rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book w-8 h-8 mr-2 stroke-current hover:stroke-gray-600"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="#CCCCCC"
                        fill="none"
                        stroke-linecap="round" s
                        troke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M6 4v16l6 -2l6 2V4" />
                        <path d="M6 4l6 6l6 -6" />
                        </svg>Courses</a>

                        <a href="{{ route('events.index') }}" class="flex items-center px-3 py-2 mx-3 mt-2 text-gray-200 hover:text-gray-700 transition-colors duration-300 transform rounded-md lg:mt-0 hover:bg-gray-100 hover:rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book w-8 h-8 mr-2 stroke-current hover:stroke-gray-600" 
                        fill="none" viewBox="0 0 24 24" 
                        stroke-width="1.5" stroke="currentColor" 
                        class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                        </svg>Events</a>
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <a href="/">
                    <img src="{{ asset('img/log out.png') }}" alt="Log out" class="h-6 sm:h-9 object-contain">
                </a>
            </div>
        </div>
    </div>
</nav>
