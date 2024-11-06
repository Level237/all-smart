import React from 'react'
import Hero from '../components/Hero'
import Header from '../components/Header'
import ListBrand from '@/components/Brands/ListBrand'

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
    
    </section>
    </>
  )
}
