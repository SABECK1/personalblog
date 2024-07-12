<!DOCTYPE html>
<html lang='en'>

<livewire:htmlhead/>
<body class="light-theme">
<livewire:header/>
@yield('content')
@include('layouts.footer')
</body>
<script>
    function goToUrl(url, event) {
        // Navigate to the specified URL
        window.location.href = url;
        event.stopPropagation();
    }
</script>
</html>
