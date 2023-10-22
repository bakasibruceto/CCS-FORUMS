<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Include your CSS and JavaScript files if needed -->
</head>
<body>
    <header>
        <!-- Include your navigation bar or header content here -->
    </header>

    <main class="container mx-auto p-4">
        <div class="bg-white rounded-lg shadow-lg p-4">
            <div class="text-center">
                <!-- Display user's profile picture -->
                <img src="{{ $user->profile_picture }}" alt="{{ $user->name }}" class="w-32 h-32 rounded-full mx-auto mb-4">

                <!-- Display user's name -->
                <h1 class="text-2xl font-bold">{{ $user->name }}</h1>

                <!-- Display user's email -->
                <p class="text-gray-600">{{ $user->email }}</p>

                <!-- Add any additional user information here -->
            </div>
        </div>
    </main>

    <footer>
        <!-- Include your footer content here -->
    </footer>
</body>
</html>
