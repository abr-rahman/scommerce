<div class="heading_area" >
    <div class="" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div class="">
            <div style="display: flex; align-items: center; gap: 5px;">
                <strong style="font-size: 15px;">Print Date: </strong>
                <p>{{ \Carbon\Carbon::now() }}</p>

            </div>
            <div style="display: flex; align-items: center; gap: 5px;">
                <strong style="font-size: 15px;">Phone:</strong>
                <p>{{ $siteSettings->first()->phone_one }}</p>
            </div>
            <div style="display: flex; align-items: center; gap: 5px;">
                <strong style="font-size: 15px;">Email:</strong>
                <span>{{ $siteSettings->first()->support_email }}</span>
            </div>
            <div style="display: flex;">
                <strong style="font-size: 15px;">Address: </strong>
                <div style="align-items: center; gap: 5px;width: 500px; margin-left: 2px;">
                    <span> {{ $siteSettings->first()->address_one }}</span>
                </div>
            </div>
        </div>
        <img src="{{ asset('uploads/logo/'. $siteSettings->first()->logo) ?? asset('frontend/images/logo.png')  }}" alt="logo" style="width: 250px; ">
    </div>
</div>
<div style="border-bottom: 1px solid #000000; margin-bottom: 20px;">
</div>