<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sistem Rekapan Rumah Sakit Ibu & Anak Andini</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
   <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100 min-h-screen">
   <nav class="fixed top-0 z-50 w-full bg-white border-b border-blue-gray-100 dark:bg-gray-800 dark:border-gray-700">
      <div class="px-3 py-3 lg:px-5 lg:pl-3">
         <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
               <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                  type="button"
                  class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                  <span class="sr-only">Open sidebar</span>
                  <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                     <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                     </path>
                  </svg>
               </button>
               <a href="" class="flex ms-2 md:me-24">
                  <img src="http://rsiaandini.com/theme/Medicom/img/LOGO_BARUPKU.png" class="h-8 me-3"
                     alt="FlowBite Logo" />
                  <!-- <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">🏥 Rekapan RSIA Andini</span> -->
               </a>
            </div>
            <div class="flex items-center">
               <div class="flex items-center ms-3">
                  <div>
                  </div>
               </div>
            </div>
         </div>
   </nav>

   <aside id="logo-sidebar"
      class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white shadow-md border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
      aria-label="Sidebar">
      <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
         <ul class="space-y-2 font-medium text-sm pl-0">
            <li>
               <a href=""
                  class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg
                     class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                     <path
                        d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                     <path
                        d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                  </svg>
                  <span class="ms-3">Dashboard</span>
               </a>
            </li>
            <li>
               <button type="button"
                  class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                  aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                  <svg
                     class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                     <path
                        d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                  </svg>
                  <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-sm">Keuangan</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                  </svg>
               </button>
               <ul id="dropdown-example" class="hidden py-2 space-y-2">
                  <li>
                     <a href="/keuangan"
                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Embalase</a>
                  </li>
               </ul>
            </li>
         </ul>
      </div>
   </aside>

   <div class="p-4 sm:ml-64 pt-9 min-h-screen flex flex-col content-between">
      <div
         class="relative text-white mt-8 h-72 w-full shadow-lg overflow-hidden rounded-xl bg-[url('http://rsiaandini.com/theme/Medicom/img/about-slider-img2.jpg')] bg-cover	bg-center">
         <div class="absolute flex flex-col items-center justify-center inset-0 h-full w-full bg-zinc-900/60">
            <h1 class="mb-3 tracking-[.65em] text-sm font-light">WELCOME TO</h1>
            <h1 class="font-bold text-4xl px-2 py-1.5 text-white bg-orange-500 shadow-lg shadow-orange-500/35 rounded-lg dark:bg-blue-500">Sirekap Data RSIA Andini</h1>
         </div>
         
      </div>
      <div class="text-blue-gray-600 mt-auto">
         <footer class="py-2">
            <div class="flex w-full flex-wrap items-center justify-center gap-6 px-2 md:justify-between">
               <p class="block w-full text-center antialiased font-sans text-sm leading-normal font-normal text-inherit">© 2025 RSIA Andini Pekanbaru</p>
            </div>
         </footer>
      </div>
   </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</html>