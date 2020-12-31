<x-app-layout>
            <div class="bg-white overflow-hidden">
                <!--Title-->
                <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Add new product</h2>

                <div id='section2' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

                    <form>

                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                    Text Field
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input class="form-input block w-full focus:bg-white" id="my-textfield" type="text" value="">
                                <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
                            </div>
                        </div>

                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-select">
                                    Drop down field
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <select name="" class="form-select block w-full focus:bg-white" id="my-select">
                                    <option value="Default">Default</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>

                                <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
                            </div>
                        </div>

                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textarea">
                                    Text Area
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <textarea class="form-textarea block w-full focus:bg-white" id="my-textarea" value="" rows="8"></textarea>
                                <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
                            </div>
                        </div>

                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3"></div>
                            <div class="md:w-2/3">
                                <button class="shadow bg-yellow-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
</x-app-layout>
