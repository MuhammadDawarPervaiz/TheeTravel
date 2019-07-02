@extends('layouts.admin')

@section("tab-content")
<div id="ComplaintRegisteration" class="tab-pane fade in active">
    <h1>Complaint Form</h1>

    <div class="row">
        <div class="col-sm-4 col-md-3">
            <div class="travelo-box contact-us-box">
                <ul class="contact-address">
                    <li class="address">
                        <i class="soap-icon-address circle"></i>
                        <h5 class="title">Address</h5>
                        <p>4106 Liberty Boulevard Chicago Illinois USA</p>
                    </li>
                    <li class="phone">
                        <i class="soap-icon-phone circle"></i>
                        <h5 class="title">Phone</h5>
                        <p>Local: 001-866-256-6122</p>
                    </li>
                    <li class="email">
                        <i class="soap-icon-message circle"></i>
                        <h5 class="title">Email</h5>
                        <p>enquiry@theetravel.com</p>
                    </li>
                </ul>
                <ul class="social-icons full-width">
                    <li><a href="https://twitter.com/TheeTravel" data-toggle="tooltip" title="Twitter"><i class="soap-icon-twitter"></i></a></li>
                    <li><a href="#" data-toggle="tooltip" title="GooglePlus"><i class="soap-icon-googleplus"></i></a></li>
                    <li><a href="#" data-toggle="tooltip" title="Facebook"><i class="soap-icon-facebook"></i></a></li>
                    <li><a href="#" data-toggle="tooltip" title="Linkedin"><i class="soap-icon-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-8 col-md-9">
            <div class="travelo-box">
                <form class="contact-form" action="{{ route('customer.complaint.submit')}}" method="post">
                    {{ csrf_field() }}
                    <h4 class="box-title">Send us your complain</h4>
                    <div class="alert small-box" style="display: none;"></div>
                    <div class="row form-group">
                        <div class="col-xs-6">
                            <label>Your Name</label>
                            <input type="text" name="name" class="input-text full-width" value="{{ $customerData['firstName'] }}" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode <= 32' required>
                        </div>
                        <div class="col-xs-6">
                            <label>Your Email</label>
                            <input type="email" name="email" class="input-text full-width" value="{{ $customerData['email'] }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Your Complain</label>
                        <textarea name="complain" rows="6" class="input-text full-width" placeholder="write complain here" required></textarea>
                    </div>
                    <button type="submit" class="btn-large full-width">SEND Complaint</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
