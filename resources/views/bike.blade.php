<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add New Bike for Sale</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-100">
    <h1 class="text-red-500 text-3xl text-center font-bold py-4 mb-5 bg-red-100">Test - 2 (CRUD Operation)</h1>
    <div class="flex items-center justify-center min-h-screen pb-10">
      <div class="w-full max-w-2xl p-8 bg-white rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-8 text-center text-gray-900">
          Add New Bike for Sale
        </h1>


        <form action="{{route('bike')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div>
            <label for="image" class="block text-sm font-medium text-gray-700"
              >Bike Image</label
            >
            <input
              type="file"
              id="image"
              name="img"
              accept="image/*"
              class="mt-1 block w-full text-sm text-gray-500 file:py-2 file:px-4 file:border file:border-gray-300 file:rounded-md file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
            />
          </div>

          <div>
            <img
              id="preview"
              src="https://via.placeholder.com/300x200"
              alt="Bike Image Preview"
              class="w-2/3 h-auto mt-4 rounded-md border border-gray-300"
            />
          </div>

          <div>
            <label for="name" class="block text-sm font-medium text-gray-700"
              >Bike Name</label
            >
            <input
              type="text"
              id="name"
              name="name"
              required
              class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            />
          </div>

          <div>
            <label for="brand" class="block text-sm font-medium text-gray-700"
              >Brand</label
            >
            <input
              type="text"
              id="brand"
              name="brand"
              required
              class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            />
          </div>

          <div>
            <label for="model" class="block text-sm font-medium text-gray-700"
              >Model</label
            >
            <input
              type="text"
              id="model"
              name="model"
              required
              class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            />
          </div>

          <div>
            <label for="year" class="block text-sm font-medium text-gray-700"
              >Year</label
            >
            <input
              type="number"
              id="year"
              name="year"
              required
              class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            />
          </div>

          <div>
            <label for="price" class="block text-sm font-medium text-gray-700"
              >Price</label
            >
            <input
              type="number"
              id="price"
              name="price"
              required
              class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            />
          </div>

          <div>
            <label
              for="description"
              class="block text-sm font-medium text-gray-700"
              >Description</label
            >
            <textarea
              id="description"
              name="description"
              rows="4"
              class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            ></textarea>
          </div>

          <div>
            <span class="block text-sm font-medium text-gray-700">Status</span>
            <div class="mt-1 flex items-center space-x-6">
              <div class="flex items-center">
                <input
                  type="radio"
                  id="active"
                  name="status"
                  value="1"
                  class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500"
                />
                <label for="active" class="ml-2 block text-sm text-gray-700"
                  >Active</label
                >
              </div>
              <div class="flex items-center">
                <input
                  type="radio"
                  id="inactive"
                  name="status"
                  value="0"
                  class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500"
                />
                <label for="inactive" class="ml-2 block text-sm text-gray-700"
                  >Inactive</label
                >
              </div>
            </div>
          </div>

          <div>
            <button
              type="submit"
              class="w-full px-4 py-3 bg-indigo-600 text-white font-bold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
              Add Bike
            </button>
          </div>
        </form>
      </div>
    </div>

    <script>
      // JavaScript to handle image preview
      document
        .getElementById("image")
        .addEventListener("change", function (event) {
          const file = event.target.files[0];
          const preview = document.getElementById("preview");
          if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
              preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
          } else {
            preview.src = "https://via.placeholder.com/300x200";
          }
        });
    </script>


  </body>
</html>
