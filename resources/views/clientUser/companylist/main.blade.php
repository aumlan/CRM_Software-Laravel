<div class="row mt-4 justify-content-center">
    <div class="col col-xl-8 border rounded border-primary">
        <div class="border-bottom text-center">
            <label class="mt-4" for="">
                <h2><b>{{Session::get('company_name')}}</b></h2>
            </label><br />
            <label class="mt-2" for="">Phone: {{Session::get('company_contact')}}</label><br />
        </div>
    </div>
</div>

<div class="row mt-4 justify-content-center">
    <div class="col col-2">
        <button class="active btn btn-primary btn-block">
            <a href="{{ route('companylist.lifecycle', Session::get('company_id')) }}"><span class="text-light">Details</span></a></button><br />
    </div>
    <div class="col col-2">
        <button class="btn btn-secondary btn-block">
            <a href="{{ route('companylist.service', Session::get('company_id')) }}"><span class="text-light">Services</span></a></button><br />
    </div>
    <div class="col col-2">
        <button class="btn btn-info btn-block">
            <a href="{{ route('companylist.proposal', Session::get('company_id')) }}"><span class="text-light">Proposals</span></a></button><br />
    </div>
    <div class="col col-2">
        <button class="btn btn-dark btn-block">
            <a href="/chat"><span class="text-light">Chat</span></a></button><br />
    </div>
</div>