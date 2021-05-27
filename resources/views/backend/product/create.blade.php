<x-app-layout>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Create new product
    </h2>
            <div class="bg-white overflow-hidden">
                <!--Title-->
                <div id='section2' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

                    <form autocomplete="off" action = "/admin/products" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="name">
                                    Name
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input class="form-input block w-full focus:bg-white" id="name" name="name" type="text" value="">
                                <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
                            </div>
                        </div>
                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="article_num">
                                    Article number
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input class="form-input block w-full focus:bg-white" id="article_num" name="article_num" type="text" value="">
                                <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
                            </div>
                        </div>
                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="type">
                                    Type of product
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <select name="type" class="form-select block w-full focus:bg-white" id="type">
                                    <option value="Default">Default</option>
                                    <option value="Variable product">Variable product</option>
                                </select>

                                <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
                            </div>
                        </div>

                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="description">
                                    Description
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <textarea class="form-textarea block w-full focus:bg-white" id="description" name="description" value="" rows="8"></textarea>
                                <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
                            </div>
                        </div>
                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="image">
                                    Image
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input class="form-input block w-full focus:bg-white" id="article_num" name="image" type="file" value="">
                                <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
                            </div>
                        </div>

                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3"></div>
                            <div class="md:w-2/3">
                                <button class="shadow bg-yellow-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
</x-app-layout>
