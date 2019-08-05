<template>
    <div>
        <btn cor="green" url="#" texto="Criar" icone="ion ion-android-add"></btn>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Autor</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>The Mistakes I Made as a Beginner Programmer</td>
                <td>Learn to Identify them, make habits to avoid them</td>
                <td>Gabriel Verde</td>
                <td>4 de Agosto de 2019</td>
                <td>
                    <btn url="#" icone="ion ion-android-create" cor="dark-gray"></btn>
                    <btn url="#" icone="ion ion-android-arrow-forward" cor="dark-gray"></btn>
                    <btn url="#" icone="ion ion-android-delete" cor="red"></btn>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "Tabela"
    }
</script>

<style scoped>

</style>