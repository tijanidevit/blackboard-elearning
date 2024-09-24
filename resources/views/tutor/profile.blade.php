@extends('tutor.layout.app')

@section('title')
    Profile
@endsection


<!DOCTYPE html>
<html lang="en">


<body>


    @section('body')
    <div class="col-xl-9 col-lg-9">
        <div class="settings-widget card-details mb-0">
            <div class="settings-menu p-0">
                <div class="profile-heading">
                    <h3>My Profile</h3>
                </div>
                @if (session('info'))
                    <div class="p-4"><x-success-alert type="info" key="info" /></div>
                @endif

                @if (session('success'))
                    <div class="p-4"><x-success-alert type="success" key="success" /></div>
                @endif

                @if (session('warning'))
                    <div class="p-4"><x-success-alert type="warning" key="warning" /></div>
                @endif
                <div class="checkout-form personal-address">
                    <form action="{{route('tutor.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="contact-info">
                                    <h6>Full Name</h6>
                                    <input type="text" value="{{$user->name}}" readonly class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="contact-info">
                                    <h6>Email</h6>
                                    <input type="text" value="{{$user->email}}" readonly class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="contact-info">
                                    <h6>Occupation</h6>
                                    <input type="text" name="occupation" value="{{old('occupation') ?? $user->tutor?->occupation}}" required class="form-control">
                                    <x-error-message record='occupation' />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="contact-info">
                                    <h6>Image</h6>
                                    <input type="file" accept="image/*" name="image" @required(!$user->tutor) class="form-control">
                                    <x-error-message record='image' />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="contact-info mb-0">
                                    <h6>Bio</h6>
                                    <textarea name="bio" class="form-control" id="" cols="30" rows="10">{{old('bio') ?? $user->tutor?->bio}}</textarea>
                                    <x-error-message record='bio' />
                                </div>
                            </div>

                            <div class="col-sm-12 mt-3">
                                <div class="contact-info mb-0">
                                    <button class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>
