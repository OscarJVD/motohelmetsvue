
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

        <div class="form-group">
          <label>Quantity</label>
          <input
            type="number"
            name="quantity"
            class="form-control"
            required
            v-model="quantity"
          />
        </div>

        <div class="form-group row">
          <div class="col-md-10">
            <label>Productos</label>
            <select v-model="productSelected" class="form-control" @change="addProduct()">
              <option value="">Seleccione...</option>
              <option v-for="(product, index) in products" :value="product">
                {{ product.name }}
              </option>
            </select>
          </div>
          <!-- <div class="col-md-2 mt-4">
            <button class="btn btn-primary" @click="addProduct()">+</button>
          </div> -->
        </div>
        <div class="form-group row">
          <div
            class="col-md-6 text-center row"
            v-for="(product, index) in arrProducts"
          >
            <div class="col-md-8 mt-2">
              <span>{{ product.name }}</span>
            </div>
            <div class="col-md-4 mt-2">
              <button class="btn btn-danger" @click="removeProduct(index)">
                -
              </button>
            </div>
          </div>
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
      quantity: "",
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
  mounted() {

  },
};
</script>
