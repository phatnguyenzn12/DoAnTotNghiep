<li class="nav-item ms-0 ms-md-3 dropdown">
    <!-- Notification button -->
    <a class="btn btn-light btn-round mb-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
        data-bs-auto-close="outside">
        <i class="bi bi-bell fa-fw"></i>
    </a>
    @if ($notifications != null)
        <!-- Notification dote -->
        <span class="notif-badge animation-blink"></span>
    @endif


    <!-- Notification dropdown menu START -->
    <div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0">
        <div class="card bg-transparent">
            <div
                class="card-header bg-transparent border-bottom py-4 d-flex justify-content-between align-items-center">
                <h6 class="m-0">Thông báo <span
                        class="badge bg-danger bg-opacity-10 text-danger ms-2">{{ $notifications != null ? $notifications->count() : 0 }}

                        <a class="  small" href="#">Đọc hết</a>
            </div>
            <div class="card-body p-0" style="overflow-y: scroll;max-height: 400px;">
                <ul class="list-group list-unstyled list-group-flush overflow-y">
                    <!-- Notif item -->
                    @forelse ($notifications as $notification)
                        <li>
                            <a href=""
                                class="list-group-item-action border-0 border-bottom d-flex p-3">

                                <div class="me-3">
                                    <div class="avatar avatar-md">
                                        <img class="avatar-img rounded-circle" src="/frontend/images/avatar/01.jpg"
                                            alt="avatar">
                                    </div>
                                </div>

                                <div>
                                    <p class="text-body small m-0">
                                        <b>{{ $notification->data['name'] }} ({{ $notification->data['role'] }})</b>
                                        Đã trả lời
                                        <br>
                                    {{ $notification->data['content'] }}
                                    <br>
                                    {{ $notification->created_at }}
                                    </p>


                                    <form action="{{ route('client.lesson.show', ['course' => $notification->data['course_id'], 'lesson' => $notification->data['lesson_id']]) }}" method="get">
                                        <input type="text" hidden>
                                        <button type="submit" class="btn btn-sm btn-danger-soft px-2 mb-0   " class="small">Xem chi tiết </button>
                                    </form>

                                </div>

                            </a>

                        </li>

                    @empty
                        <div class="space-x-6 relative py-7 px-6 flex items-center justify-center">
                            <h5 class="text-lg font-medium">
                                <ion-icon name="notifications-outline"></ion-icon> THÔNG BÁO TRỐNG
                            </h5>
                        </div>
                    @endforelse
                </ul>
            </div>
            <!-- Button -->
            <div class="card-footer bg-transparent border-0 py-3 text-center position-relative">
                <a href="#" class="stretched-link">Xem thêm +</a>
            </div>
        </div>
    </div>
    <!-- Notification dropdown menu END -->
</li>
