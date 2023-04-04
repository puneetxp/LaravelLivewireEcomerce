<div class="h-3 bg-gradient-to-t from-indigo-900/80 to-indigo-900/70"></div>
<div class="h-3 bg-gradient-to-t from-indigo-900/90 to-indigo-900/80"></div>
<div class="h-4 bg-gradient-to-t from-indigo-900 to-indigo-900/90"></div>
<div class="bg-indigo-900 p-2 text-white sm:p-4">
    <div class="mx-auto grid gap-2 max-w-7xl sm:gap-3 lg:gap-6 sm:grid-cols-2">
        <div class="m-auto sm:m-0 text-center sm:col-span-2">
            <div class="grid text-2xl text-bold">
                <div class="flex items-center justify-center">
                    <img class="h-24" src="/storage/logok.png">
                </div>
                <div>Shop No.12, Main Pataudi Road, </div> 
                <div>Sector-94, Hayatpur,</div>
                <div>Gurgaon, Haryana</div>
            </div>
        </div>
        <div class="m-auto sm:m-0 text-center">
            <div class="text-2xl font-bold pb-2">
                Contact Us
            </div>
            <div class="grid ">
                <a class="flex gap-2 justify-center" href="tel:+911242276008">
                    <svg width="20px" height="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4.902.25C3.498-.027 2.115.875 1.833 2.273c-1.105 5.455-1.105 9.997 0 15.454C2.08 18.952 3.17 19.8 4.388 19.8c.17 0 .342-.016.515-.05 1.412-.279 2.329-1.638 2.046-3.036-.978-4.832-.978-8.598 0-13.43C7.231 1.888 6.314.529 4.902.25zM17 2H8.436a4.08 4.08 0 0 1-.017 1.44c-.936 4.72-.936 8.398 0 13.12.098.49.09.973.017 1.44H17c1.1 0 2-.9 2-2V4c0-1.1-.899-2-2-2zm-5 12.5a1.5 1.5 0 1 1 .001-3.001A1.5 1.5 0 0 1 12 14.5zM17 9h-7V5h7v4z"/></svg>
                    0124 2276008</a>
                <a href="tel:+917712004004"><i class="fa-solid fa-phone"></i> 7712 004004</a>
                <a href="tel:+917817003003"><i class="fa-solid fa-phone"></i> 7817 003003</a>
            </div>
        </div>
        <div class="m-auto sm:m-0 text-center">
            <div class="text-2xl font-bold pb-2">Important Links</div>
            @foreach($pages as $page)
            <a href="{{route('pageview', $page->slug)}}">
                {{$page->title}}
            </a>
            @endforeach
        </div>
    </div>
    <div class="m-auto text-center text-sm text-slate-200 sm:m-0">Designed and Developed by StifflerCreations</div>
</div>
