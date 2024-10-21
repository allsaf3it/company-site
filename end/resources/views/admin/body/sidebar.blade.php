<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<div>
			<img src="{{asset('uploads/configration/'. $configration->fav_icon)}}" class="logo-icon" alt="logo icon">
		</div>
		<div>
			<h4 class="logo-text">{{auth()->user()->role}}</h4>
		</div>
		<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
		</div>
	</div>
	<!--navigation-->
	<ul class="metismenu" id="menu">
		<li>
			<a href="{{route('admin.dashboard')}}">
				<div class="parent-icon"><i class='bx bx-cookie'></i>
				</div>
				<div class="menu-title">{{trans('home.Dashboard')}}</div>
			</a>
		</li>
		@can('menuItem')
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-menu"></i>
				</div>
				<div class="menu-title">{{trans('home.MenuItems')}}</div>
			</a>
			<ul>
				<li> <a href="{{route('all.menuitem')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.all_MenuItem')}}</a>
				</li>
				<li> <a href="{{route('add.menuitem')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_MenuItem')}}</a>
				</li>
			</ul>
		</li>
		@endcan

		<!-- <li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-cart"></i>
				</div>
				<div class="menu-title">{{trans('home.categories')}}</div>
			</a>
			<ul>
				<li> <a href="{{route('all.category')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.all_categories')}}</a>
				</li>
				<li> <a href="{{route('add.category')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_category')}}</a>
				</li>
			</ul>
		</li> -->
		@can('service')
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="bx bx-repeat"></i>
					</div>
					<div class="menu-title">{{trans('home.services')}}</div>
				</a>
				<ul>
					<li> <a href="{{route('all.service')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.All Services')}}</a>
					</li>
					<li> <a href="{{route('add.service')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_service')}}</a>
					</li>
				</ul>
			</li>
		@endcan
		@can('project')
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="bx bx-category"></i>
					</div>
					<div class="menu-title">{{trans('home.projects')}}</div>
				</a>
				<ul>
					<li> <a href="{{route('all.project')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.All Projects')}}</a>
					</li>
					<li> <a href="{{route('add.project')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_project')}}</a>
					</li>
				</ul>
			</li>
		@endcan
		@can('course')
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="bx bx-bookmark-heart"></i>
					</div>
					<div class="menu-title">{{trans('home.courses')}}</div>
				</a>
				<ul>
					<li> <a href="{{route('all.course')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.All Courses')}}</a>
					</li>
					<li> <a href="{{route('add.course')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_course')}}</a>
					</li>
				</ul>
			</li>
		@endcan
		@can('bot')
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class='bx bx-bot'></i>
					</div>
					<div class="menu-title">{{trans('home.bots')}}</div>
				</a>
				<ul>
					<li> <a href="{{route('all.bot')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.All bots')}}</a>
					</li>
					<li> <a href="{{route('add.bot')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_bot')}}</a>
					</li>
				</ul>
			</li>
		@endcan
		@can('client')
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class='bx bxs-user-detail'></i>
					</div>
					<div class="menu-title">{{trans('home.clients')}}</div>
				</a>
				<ul>
					<li> <a href="{{route('all.client')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.All clients')}}</a>
					</li>
					<li> <a href="{{route('add.client')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_client')}}</a>
					</li>
				</ul>
			</li>
		@endcan
		<!-- <li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-cart"></i>
				</div>
				<div class="menu-title">{{trans('home.products')}}</div>
			</a>
			<ul>
				<li> <a href="{{route('all.products')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.all_products')}}</a>
				</li>
				<li> <a href="{{route('add.products')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_product')}}</a>
				</li>
			</ul>
		</li> -->
		@can('blog')
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-news"></i>
				</div>
				<div class="menu-title">{{trans('home.blogs')}}</div>
			</a>
			<ul>
				<li> <a href="{{route('all.blogs')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.all_blogs')}}</a>
				</li>
				<li> <a href="{{route('add.blogs')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_blog')}}</a>
				</li>
			</ul>
		</li>
		@endcan
		@can('contact-us')
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="bx bx-envelope"></i>
					</div>
					<div class="menu-title">{{trans('home.contact-us')}}</div>
				</a>
				<ul>
					<li> <a href="{{route('all.contactus')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.all-messages')}}</a>
					</li>
				</ul>
			</li>
		@endcan
		<!-- <li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-image"></i>
				</div>
				<div class="menu-title">{{trans('home.galleryImages')}}</div>
			</a>
			<ul>
				<li> <a href="{{route('all.gallery')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.all_galleryImages')}}</a>
				</li>
				<li> <a href="{{route('add.gallery')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_galleryImage')}}</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-video"></i>
				</div>
				<div class="menu-title">{{trans('home.galleryVideos')}}</div>
			</a>
			<ul>
				<li> <a href="{{route('all.video')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.all_galleryVideos')}}</a>
				</li>
				<li> <a href="{{route('add.video')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_galleryVideo')}}</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-user"></i>
				</div>
				<div class="menu-title">{{trans('home.testimonials')}}</div>
			</a>
			<ul>
				<li> <a href="{{route('all.testimonial')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.all_testimonials')}}</a>
				</li>
				<li> <a href="{{route('add.testimonial')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_testimonial')}}</a>
				</li>
			</ul>
		</li> -->
		@can('pricing')
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="bx bx-diamond"></i>
					</div>
					<div class="menu-title">{{trans('home.pricing')}}</div>
				</a>
				<ul>
					<li> <a href="{{route('all.pricing')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.All pricing')}}</a>
					</li>
					<li> <a href="{{route('add.pricing')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_pricing')}}</a>
					</li>
				</ul>
			</li>
		@endcan
		@can('permission')
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="bx bx-lock"></i>
					</div>
					<div class="menu-title">{{trans('home.permissions')}}</div>
				</a>
				<ul>
					<li> <a href="{{route('all.permission')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.All permissions')}}</a>
					</li>
					<li> <a href="{{route('add.permission')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_permission')}}</a>
					</li>
				</ul>
			</li>
		@endcan
		@can('role')
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class='bx bx-lock-open' ></i>
					</div>
					<div class="menu-title">{{trans('home.roles')}}</div>
				</a>
				<ul>
					<li> <a href="{{route('all.role')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.All Roles')}}</a>
					</li>
					<li> <a href="{{route('add.role')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_role')}}</a>
					</li>
				</ul>
			</li>
		@endcan
		@can('admin')
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="bx bx-user"></i>
					</div>
					<div class="menu-title">{{trans('home.admins')}}</div>
				</a>
				<ul>
					<li> <a href="{{route('all.user')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.All Admins')}}</a>
					</li>
					<li> <a href="{{route('add.user')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_admin')}}</a>
					</li>
				</ul>
			</li>
		@endcan
		
		@can('user')
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="bx bx-user"></i>
					</div>
					<div class="menu-title">{{trans('home.users')}}</div>
				</a>
				<ul>
					<li> <a href="{{route('all.user_dashboard')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.All users')}}</a>
					</li>

				</ul>
			</li>
		@endcan

		<li class="menu-label">{{trans('home.UI Elements')}}</li>
		@can('about-us')
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class='bx bx-donate-blood'></i>
					</div>
					<div class="menu-title">{{trans('home.AboutUS')}}</div>
				</a>
				<ul>
					<li> <a href="{{route('admin.editAbout')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.Edit_AboutUS')}}</a>
					</li>
					<!--<li> <a href="{{route('all.aboutValues')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.Edit_AboutValues')}}</a>-->
					<!--</li>-->
					<!--<li> <a href="{{route('all.aboutStruc')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.Edit_AboutStruc')}}</a>-->
					<!--</li>-->
				</ul>
			</li>
		@endcan
		@can('seo')
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class='bx bx-search-alt' ></i>
					</div>
					<div class="menu-title">{{trans('home.seo')}}</div>
				</a>
				<ul>
					<li> <a href="{{route('admin.edit.seo')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.edit_seo')}}</a>
					</li>
				</ul>
			</li>
		@endcan
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-cog"></i>
				</div>
				<div class="menu-title">{{trans('home.settings_and_configrations')}}</div>
			</a>
			<ul>
				@can('setting')
					<li> <a href="{{route('admin.edit.setting')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.settings')}}</a>
					</li>
				@endcan
				@can('configration')
					<li> <a href="{{route('admin.edit.configration')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.configrations')}}</a>
					</li>
				@endcan
			</ul>
		</li>
		<li class="menu-label">{{trans('home.dashboard')}}</li>
		@can('dashboardMenuItem')
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-menu"></i>
				</div>
				<div class="menu-title">{{trans('home.MenuItems')}}</div>
			</a>
			<ul>
				<li> <a href="{{route('all.dashboardMenuitem')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.all_MenuItem')}}</a>
				</li>
				<li> <a href="{{route('add.dashboardMenuitem')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_MenuItem')}}</a>
				</li>
			</ul>
		</li>
		@endcan
		@can('homeSlider')
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class='bx bx-home-alt' ></i>
					</div>
					<div class="menu-title">{{trans('home.HomeSliders')}}</div>
				</a>
				<ul>
					<li> <a href="{{route('all.homeslider')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.All HomeSliders')}}</a>
					</li>
					<li> <a href="{{route('add.homeslider')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.Add HomeSlider')}}</a>
					</li>
				</ul>
			</li>
		@endcan
		@can('tradeBot')
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class='bx bx-bot' ></i>
					</div>
					<div class="menu-title">{{trans('home.bots')}}</div>
				</a>
				<ul>
					<li> <a href="{{route('all.tradeBot')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.All bots')}}</a>
					</li>
					<li> <a href="{{route('add.tradeBot')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_bot')}}</a>
					</li>
				</ul>
			</li>
		@endcan
		@can('BotTypeChild')
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class='bx bx-bot' ></i>
					</div>
					<div class="menu-title">{{trans('home.child_bots')}}</div>
				</a>
				<ul>
					<li> <a href="{{route('all.tradeBotChild')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.All bots')}}</a>
					</li>
					<li> <a href="{{route('add.tradeBotChild')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_bot')}}</a>
					</li>
				</ul>
			</li>
		@endcan
		@can('faq')
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-news"></i>
				</div>
				<div class="menu-title">{{trans('home.faqs')}}</div>
			</a>
			<ul>
				<li> <a href="{{route('all.faq')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.all_faqs')}}</a>
				</li>
				<li> <a href="{{route('add.faq')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('home.add_faq')}}</a>
				</li>
			</ul>
		</li>
		@endcan

	</ul>
	<!--end navigation-->
</div>
<!--end sidebar wrapper -->