<template>
  <div>
      <select-state v-model="model.company.state" />
    <!-- <div class="flex">
      <input-cnpj v-model="model.company" class="w-1/4 pr-2" required />
      <sys-input
        v-model="model.company.state_registration"
        label="Inscrição estadual"
        class="w-1/4 pr-2"
      />
      <sys-input
        v-model="model.company.city_registration"
        label="Inscrição municipal"
        class="w-1/4 pr-2"
      />
      <sys-input
        label="Suframa"
        observation="Superintendência da Zona Franca de Manaus"
        class="w-1/4"
      />
    </div>
    <div class="flex">
      <sys-input
        v-model="model.company.corporate_name"
        label="Razão social"
        observation="Nome da empresa registrado nos orgãos do governo"
        class="w-1/2 pr-2"
      />
      <sys-input
        v-model="model.company.fantasy_name"
        label="Nome de fantasia"
        observation="Nome comercial ou da fachada da empresa"
        class="w-1/2"
      />
    </div>

    <div class="w-full">
      <address-form v-model="model.company.address" />
    </div>
    <div class="flex">
      <sys-phone-input label="Telefone" class="pr-2" />
      <sys-phone-input label="Celular" class="pr-2" />
      <sys-input label="Site" class="w-1/4 pr-2" />
      <sys-input label="E-mail" class="w-1/4 pr-2" />
    </div> -->
  </div>
</template>

<script lang="ts" setup>
import { Company } from "@/models/register/company";
import { reactive, ref } from "@vue/reactivity";

const model = reactive({
  company: new Company(),
});

const help = ref(true);
</script>
