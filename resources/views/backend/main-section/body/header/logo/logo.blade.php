<div class="logo-box">
    <a href="/dashboard" class="logo logo-dark text-center">
        <span class="logo-sm">
            <img src="{{ (!empty($setting->image)) ? url('backend/all-images/web/logo/'.$setting->image): url('backend/all-images/web/default/logo.png') }}" alt="" height="52">
            <!-- <span class="logo-lg-text-light">UBold</span> -->
        </span>
        <span class="logo-lg">
            <img src="{{ (!empty($setting->image)) ? url('backend/all-images/web/logo/'.$setting->image): url('backend/all-images/web/default/logo.png') }}" alt="" height="50">
            <!-- <span class="logo-lg-text-light">U</span> -->
        </span>
    </a>

    <a href="/dashboard" class="logo logo-light text-center">
        <span class="logo-sm">
            <img src="{{ (!empty($setting->image)) ? url('backend/all-images/web/logo/'.$setting->image): url('backend/all-images/web/default/logo.png') }}" alt="" height="52">
        </span>
        <span class="logo-lg">
            <img src="{{ (!empty($setting->image)) ? url('backend/all-images/web/logo/'.$setting->image): url('backend/all-images/web/default/logo.png') }}" alt="" height="50">
        </span>
    </a>
</div>