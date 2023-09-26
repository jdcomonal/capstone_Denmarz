@extends('layouts.app') <!-- Extend the layout -->

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
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

                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span
                                class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-700">{{ $pizza->PizzaName }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="py-1">
                
                        {{-- _____________________________________________    --}}
                        <section class="bg-white  sm:w-full">
                            <div class="max-w-2xl px-4  py-4 mx-auto my-4 bg-gray-100 rounded-lg">
                                <h2 class="mb-4 text-xl font-bold text-gray-900 ">Update product</h2>
                                <form  method="POST" action="{{ route('pizza.save') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class=" flex gap-4 mb-4 flex-col ">
                                        <div class="mx-auto ">
                                            <img class="max-w-xs w-72 " id="imagePreview" loading="lazy"
                                                src="{{ asset('storage/images/' . $pizza->Img) }}" alt="Pizza Photo">
                                        </div>
                                        <div>
                                            <label for="img"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Image</label>
                                            <input type="file" name="img" id="imageInput"
                                                class="  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-200 dark:border-gray-300 dark:placeholder-gray-300 dark:text-gray-500 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="">

                                        </div>
                                        <input type="text" class="hidden"  name="id" id="id" value="{{ $pizza->PizzaID }}">
                                        <div>
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Name</label>
                                            <input type="text" name="name" id="name"
                                                class="  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-150 dark:border-gray-300 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Type product name" required=""
                                                value="{{ $pizza->PizzaName }}">
                                        </div>
                                        <div class="gap-4 mb-4 grid sm:grid-cols-3">
                               

                                            <div>
                                                <label for="Rprice"
                                                    class="block mb-2 text-sm font-medium text-gray-900 ">Regular
                                                </label>
                                                <input type="number" name="Rprice" id="Rprice"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Type the price" value="{{$pizza->R}}" required="" min="0" viewBox="0 0 100 100">
                                            </div>
                                            <div>
                                                <label for="Lprice"
                                                    class="block mb-2 text-sm font-medium text-gray-900 ">Large</label>
                                                <input type="number" name="Lprice" id="Lprice"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Type the price" required="" min="0" value="{{$pizza->L}}">
                                            </div>
                                            <div>
                                                <label for="XLprice"
                                                    class="block mb-2 text-sm font-medium text-gray-900 ">Extra
                                                    Large</label>
                                                <input type="number" name="XLprice" id="XLprice"
                                                    class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Type the price" required="" min="0" value="{{$pizza->XL}}">
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="description"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Description</label>
                                            <textarea id="description" name="description" rows="4"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-150 dark:border-gray-300 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Write product description here">{{ $pizza->Description }}</textarea>
                                        </div>

                                        

                                        <div class="flex items-center space-x-4 mt-3">
                                            <button type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                Save Changes
                                            </button>

                                        </div>
                                </form>
                            </div>
                        </section>


                        {{-- _____________________________________________    --}}

            </div>
        </div>



    </div>

    <div class="p-4 sm:ml-64 ">
        <div class="p-4  border-gray-200 rounded-lg dark:border-gray-700 mt-14">

        </div>

    </div>
