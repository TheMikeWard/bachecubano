@extends('user.layout')

@section('user_section')
<div class="page-content">
    <div class="inner-box">
        <div class="dashboard-box">
            <h2 class="dashbord-title">Privacy Settings</h2>
        </div>
        <div class="dashboard-wrapper">
            <form class="row form-dashboard">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="privacy-box privacysetting">
                        <div class="dashboardboxtitle">
                            <h2>Settings</h2>
                        </div>
                        <div class="dashboardholder">
                            <ul>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="privacysettingsone">
                                        <label class="custom-control-label" for="privacysettingsone">Make my profile photo
                                            public</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="privacysettingstwo">
                                        <label class="custom-control-label" for="privacysettingstwo">I want to receive monthly
                                            newsletter</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="privacysettingsthree">
                                        <label class="custom-control-label" for="privacysettingsthree">I want to receive e-mail
                                            notifications of offers/messages</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="privacysettingsfour">
                                        <label class="custom-control-label" for="privacysettingsfour">I want to receive e-mail
                                            alerts about new listings</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="privacysettingsfive">
                                        <label class="custom-control-label" for="privacysettingsfive">Enable offers/messages
                                            option in all my ads Post</label>
                                    </div>
                                </li>
                            </ul>
                            <button class="btn btn-common" type="submit">Update</button>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="privacy-box deleteaccount">
                        <div class="dashboardboxtitle">
                            <h2>Delete Account</h2>
                        </div>
                        <div class="dashboardholder">
                            <div class="form-group mb-3 tg-inputwithicon">
                                <div class="tg-select form-control">
                                    <select>
                                        <option value="none">Select State</option>
                                        <option value="none">Select State</option>
                                        <option value="none">Select State</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Description"></textarea>
                            </div>
                            <button class="btn btn-common" type="button">Delete</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection