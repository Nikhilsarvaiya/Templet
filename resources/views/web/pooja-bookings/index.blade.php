@extends('web.layouts.default')
@section('web.includes.footer')
@section('content')
    <section class="sub_banner">
      <div class="container">
        <h1>Pooja Booking</h1>
      </div>
    </section>

    <section class="inner_wrap contact_wrap donatenow_wrap">
        <div class="container">
            <article>
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="monthYear"> February {{date('Y')}} </h3>
                </div>
                <div class="col-lg-6">
                    <div class="booking_info">
                        <ul>
                            <li>
                                <spa class="available_tag"></spa>Available
                            </li>
                            <li>
                                <spa class="not_available_tag"></spa>Already Booked
                            </li>
                            <p><span>Note: </span> Pooja Booking Each Slots 15 mint Only</p>
                        </ul>
                    </div>
                </div>
            </div>
            {!!$calender_days!!}
            <!-- <ul class="days">
                <li>Sun</li>
                <li>Mon</li>
                <li>Tues</li>
                <li>Wed</li>
                <li>Thurs</li>
                <li>Fri</li>
                <li>Sat</li>
            </ul>
            <ul class="dates">
                <li class="fade"><span class="date">29</span></li>
                <li class="fade"><span class="date">30</span></li>
                <li><span class="date">1</span>
                    <ul class="event_add_new">
                        <li class="available" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                        <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                        <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                        <li class="available" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                        <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                        <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                        <li class="available" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                        <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                        <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                        <li class="available" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                        <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                        <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                        <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                        <li class="available" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                        <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                        <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>

                    </ul>
                </li>
                <li>
                    <section class="dateWrapper">
                        <span class="date">2</span>
                        <ul class="event_add_new">
                            <li class="available" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                            <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                            <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                            <li class="available" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                            <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                            <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                            <li class="available" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                            <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                            <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                            <li class="available" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                            <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                            <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                            <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                            <li class="available" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                            <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                            <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                        </ul>
                    </section>
                </li>
                <li class="current today">
                    <section class="dateWrapper">
                        <span class="date">3</span>
                        <ul class="event_add_new">
                            <li class="booking" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                            <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                            <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                            <li class="available" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                            <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                            <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                            <li class="available" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                            <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                            <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                            <li class="available" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                            <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                            <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                            <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                            <li class="available" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                            <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                            <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                        </ul>
                    </section>
                </li>
                <li><span class="date">4</span>
                    <h2 class="not_slot">Slot not Available</h2>
                </li>
                <li><span class="date">5</span></li>
                <li><span class="date">6</span></li>
                <li><span class="date">7</span></li>
                <li><span class="date">8</span></li>
                <li><span class="date">9</span></li>
                <li><span class="date">10</span></li>
                <li><span class="date">11</span></li>
                <li><span class="date">12</span></li>
                <li><span class="date">13</span></li>
                <li><span class="date">14</span></li>
                <li><span class="date">15</span></li>
                <li>
                    <span class="date">16</span>
                </li>
                <li>
                    <span class="date">17</span>
                </li>
                <li>
                    <span class="date">18</span>
                </li>
                <li>
                    <span class="date">19</span>
                </li>
                <li><span class="date">20</span></li>
                <li><span class="date">21</span> </li>
                <li><span class="date">22</span></li>
                <li><span class="date">23</span></li>
                <li><span class="date">24</span></li>
                <li><span class="date">25</span></li>
                <li><span class="date">26</span></li>
                <li><span class="date">27</span></li>
                <li><span class="date">28</span></li>
                <li><span class="date">29</span></li>
                <li><span class="date">30</span></li>
                <li><span class="date">31</span></li>
                <li class="fade"><span class="date">1</span></li>
                <li class="fade"><span class="date">2</span></li>
            </ul> -->
            <div class="calendarNav">
                <a href="#prevDay" class="prevDay">Previous Day</a>
                <a href="#today" class="today">Current Day</a>
                <a href="#" class="nextDay">Next Day</a>
            </div>
            </article>
        </div>
    </section>

      </div>
    </section>
@endsection
@push('script')
    <script>
    </script>
@endpush
