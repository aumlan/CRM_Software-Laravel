@include('clientUser.header')

<main id="main">
    <section>
        @include('clientUser.companylist.main')

        <div class="row mt-4 justify-content-center">
            <div class="col col-xl-9">
                <section id="profile-section">
                    <div class="row m-0 p-0">
                        <div class="col-12 bg-primary mb-3 pt-3">
                            <h5 class="text-light">Company Details</h5>
                        </div>
                        <div class="col-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Name :</td>
                                        <td>{{$company->company_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone :</td>
                                        <td>{{$company->contact_number}}</td>
                                    </tr>
                                    <tr>
                                        <td>Address :</td>
                                        <td>
                                            {{$company->company_address}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Formation :</td>
                                        <td>{{$company->type}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <section id="profile-section">
                    <div class="row m-0 p-0">
                        <div class="col-12 bg-primary mb-3 pt-3">
                            <h5 class="text-light">Manager Details</h5>
                        </div>
                        <div class="col-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Name :</td>
                                        <td>{{$company->full_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone :</td>
                                        <td>{{$company->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email :</td>
                                        <td>{{$company->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Address :</td>
                                        <td>{{$company->address}}</td>
                                    </tr>
                                    <tr>
                                        <td>City :</td>
                                        <td>{{$company->city}} </td>
                                    </tr>
                                    <tr>
                                        <td>Country :</td>
                                        <td>{{$company->country}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</main>

@include('clientUser.footer')