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
    <div class="row row-xl-12 justify-content-center">
        <div class="col col-4">
            <button class="active btn btn-primary btn-block">
                <a href="{{ route('company.lifecycle', Session::get('company_id')) }}"><span class="text-light">Details</span></a></button><br />
        </div>
        <div class="col col-4">
            <button class="btn btn-secondary btn-block">
                <a href="{{ route('company.service', Session::get('company_id')) }}"><span class="text-light">Services</span></a></button><br />
        </div>
        <div class="col col-4">
            <button class="btn btn-dark btn-block">
                <a href="/chat"><span class="text-light">Chat</span></a></button><br />
        </div>
        <div class="col col-4">
            <button class="btn btn-info btn-block">
                <a href="{{ route('company.appointment', Session::get('company_id')) }}"><span class="text-light">Appoitments</span></a></button><br />
        </div>
        <div class="col col-4">
            <button class="btn btn-warning btn-block">
                <a href="{{ route('company.note', Session::get('company_id')) }}"><span class="text-light">Notes</span></a></button><br />
        </div>
        <div class="col col-4">
            <button class="btn btn-danger btn-block">
                <a href="{{ route('company.proposal', Session::get('company_id')) }}"><span class="text-light">Proposals</span></a></button><br />
        </div>
    </div>
</div>