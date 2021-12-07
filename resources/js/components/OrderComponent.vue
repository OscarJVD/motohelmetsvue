
<template>
  <div class="container mt-n10">
    <div class="card">
      <div class="card-body">
        <div class="form-group">
          <label>Fecha Orden</label>
          <input
            type="date"
            name="dateOrder"
            class="form-control"
            required
            v-model="dateOrder"
          />
        </div>
        <div class="alert alert-danger" role="alert" v-if="showError === true">
          El atributo es requerido
        </div>

        <div class="form-group">
          <label>Total</label>
          <input
            type="number"
            name="total"
            class="form-control"
            required
            v-model="total"
          />
        </div>

        <div class="form-group">
          <label>Observaciones</label>
          <input
            type="text"
            name="observations"
            class="form-control"
            required
            v-model="observations"
          />
        </div>

        <div class="form-group">
          <label>Cliente</label>
          <select v-model="personSelected" class="form-control">
            <option value="">Seleccione....</option>
            <option v-for="(person, index) in persons" :value="person.id">
              {{ person.name }}
            </option>
          </select>
        </div>

        <div class="form-group">
          <label>Precio</label>
          <input
            type="number"
            name="price"
            class="form-control"
            required
            v-model="price"
          />
        </div>

        <div class="form-group row">
          <div class="col-md-10">
            <label>Productos</label>
            <select
              v-model="productSelected"
              class="form-control"
              @change="addProduct()"
            >
              <option value="">Seleccione...</option>
              <option v-for="(product, index) in products" :value="product">
                {{ product.name }}
              </option>
            </select>
          </div>
        </div>
        <div class="form-group row justify-content-center">
          <table
            class="table table-responsive table-light col-6 col-sm-12 col-md-8 col-lg-6 justify-content-center"
          >
            <thead>
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(product, index) in arrProducts">
                <th scope="row">{{ product.barcode }}</th>
                <td>{{ product.name }}</td>
                <td>
                  <input
                    v-model="product.quantity_to_buy"
                    type="text"
                    class="form-control quantity"
                    required
                    placeholder="Ingrese cantidad"
                  />
                </td>
                <td>${{ product.price }}</td>
                <td>
                  <div class="col-md-4 mt-2">
                    <button
                      class="btn btn-danger"
                      @click="removeProduct(index)"
                    >
                      -
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="d-flex justify-content-center">
          <button
            class="btn btn-primary float-right mt-5"
            @click="submitForm()"
          >
            Guardar
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      dateOrder: "",
      total: "",
      observations: "",
      personSelected: "",
      price: "",
      productSelected: "",
      arrProducts: [],
      showError: false,
    };
  },
  props: {
    url: {
      type: String,
      default: "",
    },
    persons: {
      type: Array,
      default: [],
    },
    products: {
      type: Array,
      default: [],
    },
  },
  methods: {
    addProduct: function () {
      // Cantidad input field unique value
      if (this.flag == true)
        this.arrProducts.push({ quantity_to_buy: "" });

      if (this.productSelected !== "") {
        if (typeof this.existProduct(this.productSelected.id) === "undefined") {
          this.arrProducts.push(this.productSelected);
          this.productSelected = "";
        } else {
          alert("El producto ya se encuentra seleccionado");
        }
      } else {
        alert("debe seleccionar por lo menos un producto");
      }
    },
    existProduct: function (productId) {
      let existProduct = this.arrProducts.find(function (product) {
        return product.id === productId;
      });
      return existProduct;
    },
    removeProduct: function (index) {
      this.arrProducts.splice(index, 1);
    },
    submitForm: function () {

      if (
        this.personSelected != "" &&
        this.dateOrder != "" &&
        this.total != "" &&
        this.observations != "" &&
        this.price != "" &&
        this.quantity != "" &&
        this.arrProducts.length > 0
      ) {
        let data = {
          dateOrder: this.dateOrder,
          total: this.total,
          observations: this.observations,
          person_id: this.personSelected,
          price: this.price,
          quantity: this.quantity,
          arrProducts: this.arrProducts,
        };

        axios
          .post(this.url, data)
          .then((response) => {
            if (response.data.success === true) {
              alert(response.data.message);
              location.href = this.url;
            } else alert(response.data.message);
          })
          .catch((error) => {
            console.log(error);
            alert("Error Insertando el producto");
          });
      } else {
        this.showError = true;
      }
    },
  },
  mounted() {},
};
</script>
