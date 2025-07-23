<div>
    <div class="row" wire:poll.3s>
        {{-- product list --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong>Em preparação</strong>
                </div>
                <div class="card-body">

                    <div class="row">
                        @foreach ($preparing as $order)
                            <div class="col-3 d-flex">
                                <x-display.display-card-order :order="$order" status="" />
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>

        {{-- cart --}}
        <div class="col-6">
            <div class="card bg-success">
                <div class="card-header">
                    <strong>Retirar</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($done as $order)
                            <div class="col-3 d-flex">
                                {{-- <div class="card">
                                <div class="card-body h1 text-center text-success">
                                    <strong>{{ $order->orderCode() }}</strong>
                                </div>
                            </div> --}}
                                <x-display.display-card-order :order="$order" status="success" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    {{ $lastOrderDone }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>


    <audio id="som-pronto" src="{{ asset('img/alert.mp3') }}" preload="auto"></audio>


</div>

@section('scripts')
    <script>

        window.addEventListener('DOMContentLoaded', () => {
            document.body.addEventListener('click', () => {
                // alert('asd')
                const audio = document.getElementById('som-pronto');
                audio.play().then(() => {
                    audio.pause();
                    audio.currentTime = 0;
                }).catch(() => {});
            }, { once: true });
        });

            window.addEventListener('show', (e) => {

                const audio = document.getElementById('som-pronto');
                audio.play();
                $('#modelId').modal('show')
            });
            window.addEventListener('close-modal', () => {
                $('#modal-product').modal('hide');
            });
    </script>
@endsection
