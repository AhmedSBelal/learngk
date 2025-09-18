<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('german_course_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/course-types*") ? "c-show" : "" }} {{ request()->is("admin/courses*") ? "c-show" : "" }} {{ request()->is("admin/enrolls*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-graduation-cap c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.germanCourse.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('course_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.course-types.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/course-types") || request()->is("admin/course-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.courseType.title') }}
                            </a>
                        </li>
                    @endcan
                        @can('course_level_access')
                            <li class="c-sidebar-nav-item">
                                <a href="{{ route("admin.course-levels.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/course-levels") || request()->is("admin/course-levels/*") ? "c-active" : "" }}">
                                    <i class="fa-fw fas fa-chalkboard-teacher c-sidebar-nav-icon">

                                    </i>
                                    {{ trans('cruds.courseLevel.title') }}
                                </a>
                            </li>
                        @endcan
                    @can('course_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.courses.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/courses") || request()->is("admin/courses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.course.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('enroll_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.enrolls.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/enrolls") || request()->is("admin/enrolls/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-address-book c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.enroll.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('study_work_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.study-works.index") }}"
                   class="c-sidebar-nav-link {{ request()->is("admin/study-works") || request()->is("admin/study-works/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.studyWork.title') }}
                </a>
            </li>
        @endcan
        @can('feature_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.features.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/features") || request()->is("admin/features/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-feather c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.feature.title') }}
                </a>
            </li>
        @endcan
        @can('team_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.teams.index") }}"
                   class="c-sidebar-nav-link {{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.team.title') }}
                </a>
            </li>
        @endcan
        @can('review_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.reviews.index") }}"
                   class="c-sidebar-nav-link {{ request()->is("admin/reviews") || request()->is("admin/reviews/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-comment c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.review.title') }}
                </a>
            </li>
        @endcan
        @can('gallery_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.galleries.index") }}"
                   class="c-sidebar-nav-link {{ request()->is("admin/galleries") || request()->is("admin/galleries/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-images c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.gallery.title') }}
                </a>
            </li>
        @endcan
        @can('work_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/jobs*") ? "c-show" : "" }} {{ request()->is("admin/job-applications*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.work.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('job_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.jobs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/jobs") || request()->is("admin/jobs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-tie c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.job.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('job_application_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.job-applications.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/job-applications") || request()->is("admin/job-applications/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-edit c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.jobApplication.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('article_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.articles.index") }}"
                   class="c-sidebar-nav-link {{ request()->is("admin/articles") || request()->is("admin/articles/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-newspaper c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.article.title') }}
                </a>
            </li>
        @endcan
        @can('faq_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.faqs.index") }}"
                   class="c-sidebar-nav-link {{ request()->is("admin/faqs") || request()->is("admin/faqs/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.faq.title') }}
                </a>
            </li>
        @endcan
        @can('contact_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.contacts.index") }}"
                   class="c-sidebar-nav-link {{ request()->is("admin/contacts") || request()->is("admin/contacts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-envelope-open c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contact.title') }}
                </a>
            </li>
        @endcan
        @can('site_setting_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/site-languages*") ? "c-show" : "" }} {{ request()->is("admin/settings*") ? "c-show" : "" }} {{ request()->is("admin/site-translations*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.siteSetting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('site_language_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.site-languages.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/site-languages") || request()->is("admin/site-languages/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-globe c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.siteLanguage.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('translation_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("languages.index") }}" target="_blank"
                               class="c-sidebar-nav-link {{ request()->is("admin/translations") || request()->is("admin/translations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-language c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.translation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.settings.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.setting.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}"
                       href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link"
               onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
