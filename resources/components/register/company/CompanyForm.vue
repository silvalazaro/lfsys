<template>
  <div>
    <div class="flex">
      <sys-input v-model="company.corporate_name" label="Razão social" tooltip="Nome da empresa registrado nos orgãos do governo" class="w-1/2 pr-2" />
      <sys-input v-model="company.fantasy_name" label="Nome de fantasia" tooltip="Nome comercial ou da fachada da empresa" class="w-1/2" />
    </div>
    <div class="flex">
      <input-cnpj class="w-1/4 pr-2" required />
      <sys-input label="Inscrição estadual" class="w-1/4 pr-2" />
      <sys-input label="Inscrição municipal" class="w-1/4 pr-2" />
      <sys-input label="Suframa" tooltip="Superintendência da Zona Franca de Manaus" class="w-1/4" />
    </div>
    <div class="w-full">
        <address-form />
    </div>
    <div class="flex">
        <sys-phone-input label="Telefone" class="pr-2"/>
        <sys-phone-input label="Celular" class="pr-2"/>
        <sys-input label="Site" class="w-1/4 pr-2" />
        <sys-input label="E-mail" class="w-1/4 pr-2" />
    </div>
  </div>
</template>

<script lang="ts" setup>
import { Company } from "@/models/register/company";

const company = new Company()

</script>
