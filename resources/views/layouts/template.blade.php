<!DOCTYPE html>
<html lang='en'>

<livewire:htmlhead/>
<body class="light-theme">
<livewire:header/>
<div class="flex-main-wrapper">
@yield('content')
@include('layouts.footer')
</div>
</body>
<script>
    function goToUrl(url, event) {
        // Navigate to the specified URL
        window.location.href = url;
        event.stopPropagation();
    }
</script>
</html>
