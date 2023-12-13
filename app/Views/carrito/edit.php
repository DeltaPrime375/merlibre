<?= $this->extend('layouts/base_layout') ?>
<?= $this->section('title') ?>Modificar datos de un producto<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="container">
        <div class="row py-4">
            <div class="row">
                <div class="col-xl-6 m-auto">
                    <form action="<?= base_url('cart/update/' . $cartItem['id_carrito']) ?>" method="POST">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5 class="card-title">Editar datos del producto en el carrito</h5>
                                        <div class="form-group mb-3">
                                            <label class="form-label">ID del Producto en el Carrito</label>
                                            <input type="text" class="form-control" name="id_carrito" value="<?= $cartItem['id_carrito'] ?>" readonly>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Cantidad:</label>
                                            <input type="number" class="form-control" name="cantidad" value="<?= $cartItem['cantidad'] ?>" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Importe del Carrito:</label>
                                            <input type="text" class="form-control" name="importe_carrito" value="<?= $cartItem['importe_carrito'] ?>" required>
                                        </div>
                                        <!-- Agrega más campos según sea necesario -->
                                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>