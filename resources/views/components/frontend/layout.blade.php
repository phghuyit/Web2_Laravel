<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Amazin' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{ $header ?? '' }}
</head>

<body class="flex flex-col min-h-screen">

    <body>

        <x-frontend.partials.header />

        <main class="flex-1">
            {{ $slot }}
        </main>
        <x-frontend.hot-news />
        <x-ui.scroll-to-top-btn />
        <x-frontend.partials.footer />

        {{ $footer ?? '' }}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script>
            $(document).ready(function() {
                let searchTimer
                const eleSearch = $('#live-search-input');
                const result = $('#search-result-container');

                eleSearch.on("input", function() {
                    clearTimeout(searchTimer);
                    let keyword = $(this).val();

                    result.toggleClass('hidden', keyword.length == 0)

                    if (keyword.length == 0) return;

                    searchTimer = setTimeout(() => {
                        if (keyword.length > 2) {
                            $.ajax({
                                url: "{{ route('site.liveSearch') }}",
                                method: 'GET',
                                data: {
                                    keyword: keyword
                                },
                                success: function(response) {
                                    result.html(response.product_data);
                                },
                                error: function(xhr, status, error) {
                                    console.error("Loi qua trinh fetch data live search: " +
                                        xhr.statusText);
                                    result.html(
                                        '<div class="p-4 text-center text-red-500">Đã có lỗi xảy ra khi tìm kiếm.</div>'
                                    );
                                }
                            })
                        }
                    }, 300);
                })

                $(document).on('click', function(e) {
                    if (!$(e.target).closest('#live-search-input, #search-result-container').length) {
                        result.addClass('hidden');
                    }
                })
            })
        </script>
    </body>

</html>
