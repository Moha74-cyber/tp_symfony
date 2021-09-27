Symfony TP:

Projet From scratch: Votre client est une galerie d’art qui souhaite organiser des événements éphémères autour de ses expositions.:

1ere étape: comprendre le besoin du client:

    ->créer une base de donnée avec les différentes tables:
    -évenements(nature de l'évenements,date,nombre de participants,temps restant)
    -Oeuvres(nom de l'oeuvre,nom d'artiste,date de crétion, description,montant de l'enchéres)
    -invités(id,nbre d'enchéres,nbre de participation)
    -enchères(montants,nbre d'enchères,temps restant pour l'enchère)
    -inscription à un évenement(nom de l'évenement,nombre d' invités,date de l'évenement)
    -Admin

    en utilisant l'invité de commande j'ai entré toutes les tables de ma base de donné en faisan un make:entity


    Etape 2 j'ai relié mes tables entre elles selon le schéma que j'ai fait a l'étape précédente
    make:entity  puis d' indiquer les relation ManyToOne OneToOne ou OneToMany


    il faut ensuite faire un doctrine:migration puis un doctrine:migrations:migrate pour entrer les tables dans la bdd

    je créer des controller pour chaque Entity ces controlleurs servent a aiguiller sur les différentes routes avec la commande make:controller


    une fois les controller créer je doit faire un make:form et entrer le nom du formulaire

     je dois créer des route sur le fichier route.yaml pour pouvoir rendre les liens clickables de mon Dashboard
