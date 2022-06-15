<nav x-data="{ open: false }" class="w-1/6 bg-gray-50">
    <div class="flex flex-col justify-between h-screen bg-white border-r">
        <div class="px-4 py-6">

            <div class="flex justify-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-10 w-auto fill-current text-gray-600"/>
                </a>
            </div>

            <nav class="flex flex-col mt-6 space-y-1">
                <a
                    href="https://github.com/mhdriz1/aws-demo" target="_blank"
                    class="flex items-center w-full px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path>
                    </svg>

                    <span class="ml-4 text-sm font-medium"> Github </span>
                </a>
                <a
                    href="{{ route('dashboard') }}"
                    @class([
                        'flex items-center px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700',
                        'bg-gray-200' => request()->routeIs('dashboard')
                    ])
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                    </svg>

                    <span class="ml-3 text-sm font-medium"> Dashboard </span>
                </a>

                <a
                    href="{{ route('elasticsearch') }}"
                    @class([
                        'flex items-center px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700',
                        'bg-gray-200' => request()->routeIs('elasticsearch')
                    ])
                >
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 opacity-75"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>

                    <span class="ml-3 text-sm font-medium"> Elasticsearch (Products) </span>
                </a>

                <a
                    href="{{ route('athena') }}"
                    @class([
                        'flex items-center px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700',
                        'bg-gray-200' => request()->routeIs('athena')
                    ])
                >
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 opacity-75"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>

                    <span class="ml-3 text-sm font-medium"> Athena (Product) </span>
                </a>

                <a
                    href="{{ route('rds') }}"
                    @class([
                        'flex items-center px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700',
                        'bg-gray-200' => request()->routeIs('rds')
                    ])
                >
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 opacity-75"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>
                    </svg>

                    <span class="ml-3 text-sm font-medium"> RDS (Product) </span>
                </a>

                <a
                    href="{{ route('dynamodb') }}"
                    @class([
                        'flex items-center px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700',
                        'bg-gray-200' => request()->routeIs('dynamodb')
                    ])
                >

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 opacity-75"
                         fill="none"
                         viewBox="0 0 21 21"
                         stroke="currentColor"
                         stroke-width="2">
                        <path d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z"/>
                        <path d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z"/>
                        <path d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z"/>
                    </svg>
                    <span class="ml-3 text-sm font-medium"> DynamoDB (Product) </span>
                </a>

                <a
                    href="{{ route('s3') }}"
                    @class([
                        'flex items-center px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700',
                        'bg-gray-200' => request()->routeIs('s3')
                    ])
                >
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 opacity-75"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"/>
                    </svg>

                    <span class="ml-3 text-sm font-medium"> S3 (Files) </span>
                </a>

                <a
{{--                    href="{{ route('lambda') }}"--}}
                    @class([
                        'flex items-center px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700',
                        'bg-gray-200' => request()->routeIs('lambda')
                    ])
                >
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 opacity-75"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                    </svg>

                    <span class="ml-3 text-sm font-medium"> Lambda (Product) </span>
                </a>

                <details class="group">
                    <summary
                        class="flex items-center px-4 py-2 text-gray-500 rounded-lg cursor-pointer hover:bg-gray-100 hover:text-gray-700"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 opacity-75"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                            />
                        </svg>

                        <span class="ml-3 text-sm font-medium"> Account </span>

                        <span
                            class="ml-auto transition duration-300 shrink-0 group-open:-rotate-180"
                        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                viewBox="0 0 20 20"
                fill="currentColor"
            >
              <path
                  fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"
              />
            </svg>
          </span>
                    </summary>

                    <nav class="mt-1.5 ml-8 flex flex-col">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                type="submit"
                                class="flex items-center w-full px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 opacity-75"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                    />
                                </svg>

                                <span class="ml-3 text-sm font-medium"
                                      onclick="event.preventDefault();
                                                this.closest('form').submit();"> {{ __('Log Out') }} </span>
                            </button>
                        </form>
                    </nav>
                </details>
            </nav>
        </div>
    </div>
</nav>
