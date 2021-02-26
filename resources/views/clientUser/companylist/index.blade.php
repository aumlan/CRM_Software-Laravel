@include('clientUser.header')

<main id="main">
    <section>
        <div class="row justify-content-center">
            <div class="col col-lg-8 mt-4">
                <h4>Companies:</h4>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col col-xl-8 mt-4">
                <table id="proposalsTable" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Office</th>
                            <th>Contact Number</th>
                            <th>Company Type</th>
                            <th>Manager</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                        <tr>
                            <td>
                                <a href="{{ route('companylist.lifecycle', $company->id) }}">{{$company->company_name}}</a>
                            </td>
                            <td>{{$company->company_address}}</td>
                            <td>{{$company->contact_number}}</td>
                            <td>{{$company->type}}</td>
                            <td>{{$company->full_name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

@include('clientUser.footer')