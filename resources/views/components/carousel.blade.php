<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicadores -->
    <div class="carousel-indicators">
        @foreach ($images as $key => $image)
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="{{ $key }}"
                    class="{{ $key === 0 ? 'active' : '' }}" aria-current="{{ $key === 0 ? 'true' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
        @endforeach
    </div>

    <!-- Imágenes -->
    <div class="carousel-inner">
        @foreach ($images as $key => $image)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset($image['url']) }}" class="d-block w-25 rounded" alt="{{ $image['alt'] }}">
                </div>
            </div>
        @endforeach
    </div>

    <!-- Controles -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Back</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
