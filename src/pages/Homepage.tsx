import React from 'react'
import Hero from '../components/Hero'
import Header from '../components/Header'
import ListBrand from '@/components/Brands/ListBrand'
import { Separator } from '@/components/ui/separator'

export default function Homepage() {
  return (
    <>

    
        <Hero/>
    <section className='bg-[#232323] py-12'>
      <div className='flex flex-col items-center justify-center gap-4'>
      <ListBrand/>
      <div>
        <h2 className='text-white underline font-primary text-xl'>Voir la liste complète de nos partenaires</h2>
      </div>
      </div>
      <div className='flex justify-around mt-8'>
      <Separator className='w-[85%]'/>
      </div>
      <div className='mx-24 mt-6'>
        <h2 className='text-white text-3xl max-w-[25rem] font-bold'>Bienvenue chez AllSmart : L'agence créative au service de votre réussite</h2>
        <p className='mt-6 text-white text-xl text-justify'>AllSmart est une agence de communication spécialisée dans la stratègie digitale,la création de contenus visuels et
          la gestion de marque.Nous accompagnons nos clients dans la conception et la mise en oeuvre de stratégies de communication efficaces et impactantes,adaptées à leur besoins.Que vous soyez une petite entreprise,une grande
          structure ou un entrepreneur,notre expertise vous aide à atteindre vos objectifs de visibilité et d'engagement.
        </p>
      </div>
    
    </section>
    </>
  )
}
