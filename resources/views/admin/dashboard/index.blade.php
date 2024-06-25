@extends('layouts.admin')

@section('title', "Dashboard")

@section('custom-css')
<link rel="stylesheet" href="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.css" />
<link rel="stylesheet" href="{{ asset('dist/css/calendar.css') }}" />
@endsection

@section("content")
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
            <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Sales Cards  -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-account"></i></h1>
                            <h6 class="text-white">Utilisateurs</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-cash"></i></h1>
                            <h6 class="text-white">Réservations</h6>
                        </div>
                    </div>
                </div>
                    <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-message"></i></h1>
                            <h6 class="text-white">Messages</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-danger text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-message"></i></h1>
                            <h6 class="text-white">Avis</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-md-flex align-items-center">
                                <div>
                                    <h4 class="card-title">Calendrier</h4>
                                    <h5 class="card-subtitle">Réservations du mois</h5>
                                </div>
                            </div>
                            <div class="row">
                                <!-- column -->
                                <div class="col-lg-9 d-flex justify-content-between">
                                    <button onclick="prev()" class="btn btn-primary">Mois Précédent</button>
                                    <span class="date-range"></span>
                                    <button onclick="next()" class="btn btn-primary">Mois Suivant</button>
                                </div>
                                <div class="col-lg-9 position-relative">
                                    <div id="calendar" class="position-relative" style="height: 400px"></div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="bg-dark p-10 text-white text-center">
                                                <i class="fa fa-user m-b-5 font-16"></i>
                                                <h5 class="m-b-0 m-t-5">{{ count($bookings) }}</h5>
                                                <small class="font-light">Total Réservations</small>
                                            </div>
                                        </div>
                                            <div class="col-6">
                                            <div class="bg-dark p-10 text-white text-center">
                                                <i class="fa fa-plus m-b-5 font-16"></i>
                                                <h5 class="m-b-0 m-t-5">{{ count($games) }}</h5>
                                                <small class="font-light">Nouveaux Jeux</small>
                                            </div>
                                        </div>
                                        <div class="col-6 m-t-15">
                                            <div class="bg-dark p-10 text-white text-center">
                                                <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                                <h5 class="m-b-0 m-t-5">{{ count($messages) }}</h5>
                                                <small class="font-light">Messages</small>
                                            </div>
                                        </div>
                                            <div class="col-6 m-t-15">
                                            <div class="bg-dark p-10 text-white text-center">
                                                <i class="fa fa-tag m-b-5 font-16"></i>
                                                <h5 class="m-b-0 m-t-5">{{ count($reviews) }}</h5>
                                                <small class="font-light">Avis</small>
                                            </div>
                                        </div>
                                        <div class="col-6 m-t-15">
                                            <div class="bg-dark p-10 text-white text-center">
                                                <i class="fa fa-table m-b-5 font-16"></i>
                                                <h5 class="m-b-0 m-t-5">{{ count($notifications) }}</h5>
                                                <small class="font-light">Notifications</small>
                                            </div>
                                        </div>
                                        <div class="col-6 m-t-15">
                                            <div class="bg-dark p-10 text-white text-center">
                                                <i class="fa fa-dollar m-b-5 font-16"></i>
                                                <h5 class="m-b-0 m-t-5">8540</h5>
                                                <small class="font-light">Chiffe d'affaires</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- column -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Recent comment and chats -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- column -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nouvelles Réservations</h5>
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Prix</th>
                                            <th>Nom du client</th>
                                            <th>Prénom du client</th>
                                            <th>Email du client</th>
                                            <th>Nombre de Joueurs</th>
                                            <th>Pack</th>
                                            <th>Date Réservation</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @forelse ($bookings as $booking)
                                            <tr>
                                                <td>{{ $booking->price }}</td>
                                                <td>{{ $booking->client->last_name }}</td>
                                                <td>{{ $booking->client->first_name }}</td>
                                                <td>{{ $booking->client->email }}</td>
                                                <td>{{ $booking->number_of_gamers }}</td>
                                                <td>{{ $booking->pack_id }}</td>
                                                <td>{{ $booking->created_at }}</td>
                                                <td>
                                                    <a type="button" href="{{ route("admin.bookings.update", ["id" => $booking->id]) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i>Détails</a>
                                                    <a type="button" href="{{  route("admin.bookings.delete", ['id' => $booking->id]) }}" class="btn btn-danger btn-sm"><i class="mdi mdi-delete-circle"></i>Supprimer</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="7">Aucune réservations</td></tr>
                                        @endforelse 
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Prix</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Email</th>
                                            <th>Nombre de Joueurs</th>
                                            <th>Pack</th>
                                            <th>Date Réservation</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
    
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nouveaux Messages</h5>
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Auteur</th>
                                            <th>Email</th>
                                            <th>Sujet</th>
                                            <th>Message</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($messages as $message)
                                            <tr>
                                                <td>{{ $message->sender }}</td>
                                                <td>{{ $message->sender_email }}</td>
                                                <td>{{ $message->subject }}</td>
                                                <td>{{ $message->content }}</td>
                                                <td>
                                                    <a type="button" href="{{ route('admin.messages.update', ["id" => 1]) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i>Détails</a>
                                                    <a type="button" href="{{ route('admin.games.delete', ["id" => 1]) }}" class="btn btn-danger btn-sm"><i class="mdi mdi-delete-circle"></i>Supprimer</a>
                                                </td>
                                            </tr>  
                                        @empty
                                            <tr class="text-center"><td colspan="7">Aucun message</td></tr>
                                        @endforelse   
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Auteur</th>
                                            <th>Email</th>
                                            <th>Sujet</th>
                                            <th>Message</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
    
                        </div>
                    </div>
                    <!-- card new -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nouveaux Avis</h5>
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Note</th>
                                            <th>Commentaire</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($reviews as $review)
                                            <tr>
                                                <td>{{ $review->name }}</td>
                                                <td>{{ $review->email }}</td>
                                                <td>{{ $review->rating }}</td>
                                                <td>{{ $review->comment }}</td>
                                                <td>
                                                    <a type="button" href="{{ route('admin.reviews.update', ["id" => 1]) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i>Détails</a>
                                                    <a type="button" href="{{ route('admin.reviews.delete', ["id" => 1]) }}" class="btn btn-danger btn-sm"><i class="mdi mdi-delete-circle"></i>Supprimer</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="text-center"><td colspan="7">Aucun avis</td></tr>
                                        @endforelse 
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Note</th>
                                            <th>Commentaire</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Recent comment and chats -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
    
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
@endsection

@section('custom-scripts')
    <script src="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.10/dayjs.min.js" integrity="sha512-FwNWaxyfy2XlEINoSnZh1JQ5TRRtGow0D6XcmAWmYCRgvqOUTnzCxPc9uF35u5ZEpirk1uhlPVA19tflhvnW1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.10/plugin/localizedFormat.min.js" integrity="sha512-vjS0MkqX58pv35Mv03gzee3TSJ74Gg5lPkgel1V8czy+sTX/ZoFMs/FqnGzWpf3IV+Ry3/mJ0i9nANcjKk1fBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.10/locale/fr.min.js" integrity="sha512-GdNlwQyB8z0UkoyjhFaBRNQ6aoIVAwczI5aNTXOU7OHRa6fT+ePEizpkjkzms9aOKpboUD2p7qQ7vY0rwVufkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src={{ asset('dist/js/calendar-app.js') }}></script>
    <script>
        calendar.createEvents([
            @foreach($bookings as $booking)
                {
                    id: {{ $booking->id }},
                    calendarId: 'bookings',
                    title: "{{ $booking->client->first_name }} {{ $booking->client->last_name }}",
                    category: 'time',
                    dueDateClass: '',
                    start: "{{ $booking->booking_date }}",
                    end: "{{ $booking->booking_date }}",
                },
            @endforeach
        ])
    </script>
@endsection