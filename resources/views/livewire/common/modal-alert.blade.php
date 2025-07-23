<div>

    <div class="modal fade" wire:ignore.self id="modal-alert" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            @if(!empty($message))
            <div class="modal-content card-outline card-{{ $type ?? 'success' }}">

                <div class="modal-body text-center pp-4 text-lg">
                    <div class="p-4">
                        @if($type == 'warning')
                            <svg  xmlns="http://www.w3.org/2000/svg" class="text-{{ $type ?? '' }}"  width="8rem"  height="8rem"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-exclamation-circle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 9v4" /><path d="M12 16v.01" /></svg>
                        @endif

                        @if($type == 'danger')
                            <svg  xmlns="http://www.w3.org/2000/svg" class="text-{{ $type ?? '' }}"  width="8rem"  height="8rem"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-exclamation-circle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 9v4" /><path d="M12 16v.01" /></svg>
                        @endif

                        @if($type == 'success')
                            {{-- <svg  xmlns="http://www.w3.org/2000/svg" class="text-{{ $type ?? '' }}"  width="8rem"  height="8rem"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-exclamation-circle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 9v4" /><path d="M12 16v.01" /></svg> --}}
                            <svg  xmlns="http://www.w3.org/2000/svg"  class="text-{{ $type ?? '' }}"  width="8rem"  height="8rem"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                        @endif

                        @if($type == 'info')
                            {{-- <svg  xmlns="http://www.w3.org/2000/svg" class="text-{{ $type ?? '' }}"  width="8rem"  height="8rem"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-exclamation-circle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 9v4" /><path d="M12 16v.01" /></svg> --}}
                            <svg  xmlns="http://www.w3.org/2000/svg"  class="text-{{ $type ?? '' }}"  width="8rem"  height="8rem"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-info-square-rounded"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9h.01" /><path d="M11 12h1v4h1" /><path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" /></svg>
                        @endif
                    </div>


                    <h4 class="font-weight-light">{{ $message ?? null }}</h4>
                </div>
                <div class="modal-footer bg-transparent  border-0">
                    <button type="button" class="btn btn-{{ $type ?? ' bg-navy' }}" data-dismiss="modal">Fechar</button>
                </div>
            </div>
            @endif
        </div>

    </div>

</div>
