<li class="nav-item ms-0 ms-md-3 dropdown">
    <!-- Notification button -->
    <a class="btn btn-light btn-round mb-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
        data-bs-auto-close="outside">
        <i class="bi bi-bell fa-fw"></i>
    </a>
    <!-- Notification dote -->
    <span class="notif-badge animation-blink"></span>

    <!-- Notification dropdown menu START -->
    <div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0">
        <div class="card bg-transparent">
            <div
                class="card-header bg-transparent border-bottom py-4 d-flex justify-content-between align-items-center">
                <h6 class="m-0">Notifications <span
                        class="badge bg-danger bg-opacity-10 text-danger ms-2">{{ $notifications != null ? $notifications->count() : 0 }}

                        <a class="  small" href="#">Clear all</a>
            </div>
            <div class="card-body p-0" style="overflow: scroll;max-height: 400px;">
                <ul class="list-group list-unstyled list-group-flush overflow-y">

                    @if (auth()->guard('mentor')->user())
                        <!-- Notif item -->
                        @forelse ($notifications as $notification)
                            <li>
                                <a href="{{ route('client.mentorLesson.show',['course' => $notification->data['course_id'], 'lesson' => $notification->data['lesson_id']]) }}"
                                    class="list-group-item-action border-0 border-bottom d-flex p-3">

                                    <div class="me-3">
                                        <div class="avatar avatar-md">
                                            <img class="avatar-img rounded-circle" src="/frontend/images/avatar/01.jpg"
                                                alt="avatar">
                                        </div>
                                    </div>

                                    <div>
                                        <p class="text-body small m-0">
                                            <b>{{ $notification->data['name'] }} ()</b>
                                            commented on
                                        <p>{{ $notification->data['content'] }}</p>

                                        </p>

                                        <u class="small">Xem chi tiết </u>
                                    </div>

                                </a>

                            </li>

                        @empty
                        @endforelse
                    @elseif (auth()->guard('web')->user())
                        <!-- Notif item -->
                        @forelse ($notifications as $notification)
                            <li>
                                <a href="{{ route('client.lesson.show',['course' => $notification->data['course_id'], 'lesson' => $notification->data['lesson_id']]) }}"
                                    class="list-group-item-action border-0 border-bottom d-flex p-3">

                                    <div class="me-3">
                                        <div class="avatar avatar-md">
                                            <img class="avatar-img rounded-circle" src="/frontend/images/avatar/01.jpg"
                                                alt="avatar">

                                        </div>
                                    </div>

                                    <div>
                                        <p class="text-body small m-0">
                                            <b>{{ $notification->data['name'] }} ()</b>
                                            đã trả lời
                                        <p>{{ $notification->data['content'] }}
                                        </p>
                                        </p>
                                        <u class="small">Xem chi tiết</u>
                                    </div>

                                </a>
                            </li>
                        @empty
                        @endforelse
                    @endif
                </ul>
            </div>
            <!-- Button -->
            <div class="card-footer bg-transparent border-0 py-3 text-center position-relative">
                <a href="#" class="stretched-link">Xem tất cả thông báo</a>
            </div>
        </div>
    </div>
    <!-- Notification dropdown menu END -->
</li>