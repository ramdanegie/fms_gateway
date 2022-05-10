<div>
    @include('partial.alert-banner')
    <form wire:submit.prevent='submit'>
        @if (!empty($shipment_no))
        <div class="mb-3">
            <label class="form-label" for="shipment_no">Quote No</label>
            <input value="{{ $shipment_no }}" class="form-control" id="shipment_no" type="text" readonly/>
        </div>
        @endif

        <div class="mb-3">
            <label class="form-label" for="subject">Subject</label>
            <input wire:model='subject' class="form-control" id="subject" type="text" placeholder="Subject" />
            @error('subject') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="message">Messages</label>
            <textarea wire:model='message' class="form-control" id="message" rows="3"></textarea>
            @error('message') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="dept">Department</label>
            <select wire:model='dept' class="form-select" id="dept" aria-label="Department">
            @foreach (config("ticket-dept") as $k => $v)
                <option wire:key='dept:{{ $k }}' value="{{ $k }}">{{ $v }}</option>
            @endforeach
            </select>
            @error('dept') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Upload Attachment</label>
            <input wire:model='attachment' class="form-control" type="file" />
            @error('attachment') <span class="error">{{ $message }}</span> @enderror
        </div>
        <hr>
        <div class="mb-3">
            <a href="{{ route("ticket.list") }}" class="btn btn-secondary btn-sm">< Return</a>
            <button class="btn btn-primary btn-sm" type="submit">Submit</button>            
        </div>
    </form>
</div>
