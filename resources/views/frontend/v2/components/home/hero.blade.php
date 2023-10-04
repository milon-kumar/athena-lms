<section>
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($sliders as $key => $slider)
                <div type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide-to="{{$key}}"
                        class="{{ $key == 0 ? 'active' : '' }}"
                        aria-current="true"
                        aria-label="Slide 1"
                        style="width: 15px;height: 15px;border-radius: 100%;"
                >
                </div>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach($sliders as $key => $slider)
            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                <div class="heroSlider">
                    <img src="{{ asset($slider->image) ?? defaultImage() }}" class="d-block w-100" alt="Slider Image">
                </div>
                <div class="carousel-caption mb-4">
                    <div class="">
                        <a href="{{ $slider->link ?? '' }}" class="btn btn-primary btn-sm float-end">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
