<div>


    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="font-weight-light">Produtos</h1>
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success" wire:click="createProduct"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar Produto</button>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <input class="form-control form-control-lg" placeholder="Pesquisar" wire:model.live="search">
        </div>
        <div class="csard-body">
            <table class="table table-striped tables-sm mb-2 text-lg">
                <thead class="thead-light">
                    <tr>
                        <th width="50%"><a href="#" class="text-muted" wire:click="sort('name')">Produto</a></th>
                        <th class="text-center"><a href="#" class="text-muted" wire:click="sort('value')">Valor</a></th>
                        <th class="text-center"><a href="#" class="text-muted" wire:click="sort('quantity')">Estoque</a></th>
                        <th class="text-center"><a href="#" class="text-muted" wire:click="sort('enabled')">Disponível</a></th>
                        <th class="text-center text-muted">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr wire:key="{{ $product->id }}" class="@if(!$product->enabled) text-muted @endif">
                        <td scope="row" class="d-flex">
                            {{-- <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" class="avatar mr-2"> --}}
                            <div>
                                <strong>{{ $product->name }}</strong>
                                {{-- <div class="text-muted"><small>{{ $product->description }}</small></div> --}}
                            </div>
                        </td>
                        <td class="text-center">R$ {{ number_format($product->value, 2, ',', '.') }}</td>
                        <td class="text-center">{{ $product->quantity }}</td>
                        <td class="text-center">
                            <div class="custom-control custom-control-lg custom-switch">
                                <input type="checkbox" class="custom-control-input"
                                    wire:click="changeStatus({{ $product->id }})" value="1" @if($product->enabled == 1)
                                checked @endif id="enabled-product-{{ $product->id }}">
                                <label class="custom-control-label" for="enabled-product-{{ $product->id }}"></label>
                            </div>
                        </td>
                        <td class="text-center">

                            <div class="dropdown">
                                <a href="#" class="" type="button" id="triggerId" data-toggle="dropdown">
                                           <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                    <a href="#" class="dropdown-item" wire:click="editProduct({{ $product->id }})"><i class="fas fa-edit    "></i> Editar</a>
                                    <a href="#" class="dropdown-item" wire:confirm="Deseja excluir esse registro?" wire:click="deleteProduct({{$product->id}})"><i class="fas fa-trash-alt    "></i> Excluir</a>
                                </div>
                            </div>

                            
                            

                        

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">
                {{ $products->links() }}
            </div>
        </div>
    </div>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
      Launch
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    Body
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click="editProduct(1)">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="modal-product" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form wire:submit="{{ $action }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Produto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <div class="form-row">

                            <input type="hidden" wire:model="id">

                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Nome do Produto</label>
                                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    wire:model="name">
                                @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
      
                              <label for="">Categoria</label>
                              <select class="form-control form-control-lg" @error('categoryId') is-invalid @enderror wire:model="categoryId">
                                <option></option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                              </select>
                              @error('categoryId')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Preço</label>
                                <input type="text" class="form-control form-control-lg @error('value') is-invalid @enderror"
                                    wire:model="value">
                                @error('value')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Estoque</label>
                                <input type="text" class="form-control form-control-lg" wire:model="quantity">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Descrição do produto</label>
                                <textarea class="form-control form-control-lg @error('description') is-invalid @enderror" wire:model="description" rows="3"></textarea>
                                @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" data-dismiss="modal">Fechar</a>
                        <button type="submit" class="btn btn-success btn-lg"> <i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                    </div>

                </div>
            </form>
        </div>
    </div>


</div>


<script>
    window.addEventListener('abrir-modal', () => {
        $('#modal-product').modal('show');
    });

    window.addEventListener('close-modal', () => {
        $('#modal-product').modal('hide');
    });
</script>