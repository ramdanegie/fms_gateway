<div>
    <div class="row">
        <div class="col-12">
            @include('partial.alert-banner')
        </div>
    </div>
    <form wire:submit.prevent='submit'>
        <div style="width: 100%; display: table;">
            <div style="display: table-row; height: 100px;">
                <div style="width: 50%; display: table-cell;">

                    <div class="col-sm-12 col-lg-11 mb-4">
                        <div class="card text-gray" style="background-color: #FFF02D">
                            <div class="card-body">
                                <div class="card-title">Info Notify Party</div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label text-uppercase" for="notifi_party">Notify Party</label>
                                        <input wire:model='notifi_party' class="form-control" id="notifi_party" type="text" placeholder="Notify Party" />
                                        @error('notifi_party') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label text-uppercase" for="pic_name">PIC Name</label>
                                        <input wire:model='pic_name' class="form-control" id="pic_name" type="text" placeholder="PIC Name" />
                                        @error('pic_name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label text-uppercase" for="pic_phone">PIC Phone</label>
                                        <input wire:model='pic_phone' class="form-control" id="pic_phone" type="text" placeholder="PIC Phone" />
                                        @error('pic_phone') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label text-uppercase" for="email">Email</label>
                                        <input wire:model='email' class="form-control" id="email" type="email" placeholder="email" />
                                        @error('email') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label text-uppercase" for="remark">Remark</label>
                                        <textarea wire:model='remark' class="form-control" id="remark" cols="30" rows="10" placeholder="Remark"></textarea>
                                        @error('remark') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div style="display: table-cell;">
                    <div class="col-sm-12 col-lg-10 mb-4">
                        <div class="card text-white" style="background-color: #1E367B">
                            <div class="card-body">
                                <div class="card-title">Detail Address</div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label text-uppercase" for="country">Country</label>
                                        <input wire:model='country' class="form-control" id="country" type="text" placeholder="Country" />
                                        @error('country') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label text-uppercase" for="city">City</label>
                                        <input wire:model='city' class="form-control" id="city" type="text" placeholder="City" />
                                        @error('city') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label text-uppercase" for="address">Address</label>
                                        <textarea wire:model='address' class="form-control" id="address" cols="30" rows="10" placeholder="Address"></textarea>
                                        @error('address') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <a href="{{ route("master.notifi-party") }}" class="btn btn-secondary btn-sm" type="submit">< Return</a>
                <button class="btn btn-primary btn-sm" type="submit" name="submit">Save</button>            
            </div>
        </div>

    </form>
</div>
