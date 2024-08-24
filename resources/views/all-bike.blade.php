<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bikes List</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <style>
        /* Additional styling for status badges */
        .status-active {
            background-color: #4ade80; /* Green */
            color: #ffffff;
        }
        .status-inactive {
            background-color: #f87171; /* Red */
            color: #ffffff;
        }
    </style>
</head>
<body class="bg-gray-100">

        @if(session('success'))
        <div id="toast" class="fixed bottom-4 right-4 bg-green-500 text-white p-4 rounded-lg shadow-lg flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1.293-10.707a1 1 0 00-1.414 0L7 10.586 5.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd" />
            </svg>
            <span>{{ session('success') }}</span>
            <button id="close-toast" class="ml-2 text-white focus:outline-none">✖</button>
        </div>
        @endif

    <h1 class="text-red-500 text-3xl text-center font-bold py-4 mb-5 bg-red-100">Test - 2 (CRUD Operation)</h1>

    <div class="p-10">
        <div class="w-full p-8 bg-white rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-4 text-gray-900">Bikes List</h2>
            @if(count($bike) > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Brand</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Model</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Year</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($bike as $b)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="{{$b->img}}" alt="Bike Image" class="w-24 h-auto rounded-md border border-gray-300" />
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$b->name}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$b->brand}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$b->model}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$b->year}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$b->Price}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full status-active">{{$b->status == 0 ? 'inactive' : 'active'}}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$b->Description}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex space-x-2">
                                <a href="{{ route('updateBike', ['id' => $b->id]) }}" class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('deleteBike', ['id' => $b->id]) }}" class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
            @else
                <p>No bikes found.</p>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toast = document.getElementById('toast');
            const closeToast = document.getElementById('close-toast');

            if (toast) {
                // Automatically hide the toast after 5 seconds
                setTimeout(() => {
                    toast.classList.add('opacity-0');
                    setTimeout(() => toast.remove(), 500); // Remove toast after fade out
                }, 5000);

                // Hide toast when close button is clicked
                closeToast.addEventListener('click', () => {
                    toast.classList.add('opacity-0');
                    setTimeout(() => toast.remove(), 500);
                });
            }
        });
    </script>

</body>
</html>
