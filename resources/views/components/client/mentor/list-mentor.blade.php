<div class="row g-4 justify-content-center">

    <!-- Card item START -->
    @foreach ($mentors as $item)
        <div class="col-lg-10 col-xl-6">
            <div class="card shadow p-2">
                <div class="row g-0">
                    <!-- Image -->
                    <div class="col-md-4">
                        <img src="{{ asset('app/' . $item->avatar) }}" class="rounded-3" alt="...">
                    </div>

                    <!-- Card body -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <!-- Title -->
                            <div class="d-sm-flex justify-content-sm-between mb-2 mb-sm-3">
                                <div>
                                    <h5 class="card-title mb-0"><a
                                            href="{{ route('client.mentor.show', $item->id) }}">{{ $item->name }}</a>
                                    </h5>
                                    <p class="small mb-2 mb-sm-0">Số điện thoại: {{ $item->number_phone }}</p>
                                </div>
                            </div>
                            <!-- Content -->
                            <p class="text-truncate-2 mb-3">{{ $item->about_me }}</p>
                            <!-- Info -->
                            <div class="d-sm-flex justify-content-sm-between align-items-center">
                                <!-- Title -->
                                <h6 class="text-orange mb-0">{{ $item->specializations }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @php
        $pagination = $mentors;
    @endphp
    <!-- Card item END -->
</div>

<!-- Pagination START -->
<div class="col-12">
    <nav class="mt-4 d-flex justify-content-center" aria-label="navigation">
        <ul class="pagination pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
            <li class="page-item mb-0"><a class="page-link"  onclick="pagination(1)"><i
                        class="fas fa-angle-double-left"></i></a></li>
            @for ($i = 1; $i <= $pagination->lastPage(); $i++)
                <li class="page-item mb-0"><a class="page-link" onclick="pagination('{{ $i }}')">{{ $i }}</a></li>
            @endfor
            <li class="page-item mb-0"><a class="page-link" onclick="pagination('{{ $pagination->lastPage() }}')"><i class="fas fa-angle-double-right"></i></a>
            </li>
        </ul>
    </nav>
</div>
<!-- Pagination END -->