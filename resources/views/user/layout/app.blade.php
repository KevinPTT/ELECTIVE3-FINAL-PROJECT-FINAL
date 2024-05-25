<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Mga meta tags at iba pang head elements -->
</head>
<body>
    @include('user.components.header') <!-- Include ang header -->

    <div class="main-content">
        @include('user.components.sidebar') <!-- Include ang sidebar -->

        @yield('content') <!-- Content ng bawat page -->
    </div>

    <!-- Mga JavaScript files o iba pang footer elements -->
</body>
</html>
