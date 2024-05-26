@extends('base')

@section('content')
<div class="row g-5">
    <div class="col-md-8">
      <h3 class="pb-4 mb-4 fst-italic border-bottom">
        La liste des articles !
      </h3>

      <article class="blog-post">
        <div class="row mb-2">

            <div class="col-md-12">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-none d-lg-block">
                        <img class="img-thumbnail" src="https://picsum.photos/250/300" alt="">
                    </div>
                    <div class="col p-4 d-flex flex-column position-static">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-inline-block gap-2 mb-3">
                                <span class="badge rounded-pill text-bg-dark">Python Tutorials</span>
                                <span class="badge rounded-pill text-bg-dark">Python Tutorials</span>
                            </div>
                            <strong class="ms-auto text-warning-emphasis">World</strong>
                        </div>

                        <h3 class="mb-0">Featured post</h3>
                        <div class="mb-1 text-body-secondary">Nov 12</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-outline-warning">Lire la suite</button>
                        </div>
                    </div>
                </div>


            </div>
          </div>
        </div>
    </article>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-body-tertiary rounded">
          <h4 class="fst-italic">À propos</h4>
          <p class="mb-0">Bienvenue sur notre blog dédié à la programmation. Découvrez les dernières tendances, tutoriels et conseils pour tous niveaux. Notre équipe passionnée vous offre des ressources pour perfectionner vos compétences. Rejoignez-nous dans cette aventure numérique!</p>
        </div>

        <div class="p-4">
          <h4 class="fst-italic">Catégories</h4>
          <ol class="list-unstyled mb-0">
                <li><a href="#">Python Tutorials</a></li>
                <li><a href="#">JavaScript Tips</a></li>
                <li><a href="#">Java Development</a></li>
                <li><a href="#">C++ Resources</a></li>
                <li><a href="#">Web Development Insights</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection
