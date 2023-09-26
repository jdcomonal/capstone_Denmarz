@extends('layouts.app') <!-- Extend the layout -->

@section('content')
    <div class="p-4 sm:ml-64  ">
        <div class="p-4  rounded-lg  mt-14">

            <nav class="flex " aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <div class="inline-flex items-center text-sm font-medium text-gray-700 dark:text-gray-700 ">
                            <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Products
                        </div>
                    </li>

                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-700">Pizza
                                List</span>
                        </div>
                    </li>
                </ol>
            </nav>


            <div class="py-2">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                    <div class="flex justify-between mt-5">
                        <button id="openModalButton" class="max-w-sm text-white inline-flex items-center bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                           Add&nbsp;Pizza
                        </button>
                        <div class=" bg-white">
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative mt-1 ">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>

                                <input type="text" id="searchInput" class="block pl-10 text-sm text-gray-900 border border-gray-200 rounded-lg min-w-min bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-200 dark:border-gray-300 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-sm sm:rounded-lg">
                        <div class="py-4 text-gray-900">
                            {{-- ---------------------------------- --}}
                            
                            <div class=" overflow-x-auto shadow-md sm:rounded-lg">
                                <table id="myTable" class="w-full text-sm text-left text-black-500">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Photo
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Pizza 
                                            </th>

                                            <th scope="col" class="px-6 py-3">
                                                Regular
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Large
                                            </th>

                                            <th scope="col" class="px-6 py-3">
                                                Extra Large
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pizza as $pizza)
                                            <tr class="bg-white border-b hover:bg-gray-100 ">
                                                <td class="px-6 py-4">
                                                    <img class=" max-h-20 h-20 max-w-sm" id="imagePreview"
                                                         src="{{ asset('storage/images/' . $pizza->Img) }}" alt="Pizza Photo">
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $pizza->PizzaName }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    ₱{{ $pizza->R }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    ₱{{ $pizza->L }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    ₱{{ $pizza->XL }}
                                                </td>
                                                
                                                <td class="px-6 py-4 ">
                                                    <a href="{{ route('pizza.edit', ['pizza' => $pizza->PizzaID]) }}"
                                                        class="mx-1 font-medium text-center text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

                                                    <a href="{{ route('pizza.remove', ['pizza' => $pizza->PizzaID]) }}" class="mx-1 font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>     
                                                </td>
                                            </tr>
                                        @endforeach


                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            {{-- ------------------------------------------- --}}
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>



    <div class="min-h-screen flex items-center justify-center">
        <!-- The Modal -->
        <div id="myModal" class="fixed inset-0 z-50 flex items-center justify-center hidden overflow-y-auto">
            <!-- Modal content -->

                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div
                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600 ">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Add Product
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            {{-- data-modal-toggle="defaultModal" --}} id="closeModalButton">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <form id="#pizzaForm" action="{{ route('pizza.store') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class=" flex gap-4 mb-4 flex-col ">
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="name"
                                    class="  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type product name" required="">
                            </div>
                            <div class="gap-4 mb-4 grid sm:grid-cols-3">
                               

                                <div>
                                    <label for="Rprice"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Regular
                                    </label>
                                    <input type="number" name="Rprice" id="Rprice"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type the price" required="" min="0" viewBox="0 0 100 100">
                                </div>
                                <div>
                                    <label for="Lprice"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Large</label>
                                    <input type="number" name="Lprice" id="Lprice"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type the price" required="" min="0">
                                </div>
                                <div>
                                    <label for="XLprice"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Extra
                                        Large</label>
                                    <input type="number" name="XLprice" id="XLprice"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type the price" required="" min="0">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea id="description" name="description" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Write product description here"></textarea>
                            </div>
                            <div>
                                <label for="img"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                                <input type="file" name="img" id="img"
                                    class="  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="" required="">
                            </div>

                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Add new product
                        </button>
                    </form>
                </div>
            
        </div>

        <!-- Overlay -->
        <div id="modalOverlay" class="fixed inset-0 bg-black opacity-50 z-40 hidden"></div>
    </div>
@endsection
