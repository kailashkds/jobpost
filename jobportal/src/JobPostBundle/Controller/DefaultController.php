<?php

namespace JobPostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use JobPostBundle\Form\UserType;
use JobPostBundle\Entity\RequirementMaster;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="job_index")
     */
    public function indexAction(Request $request)
    {
        $form = $this->getform($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('job_jobs', [
                'request' => $request
            ], 307);

            //return $this->redirectToRoute('jobpost_show', array('id' => 13));
        }
        return $this->render('job/default/index.html.twig',['form' => $form->createView()]);
    }
    
    /**
     * @Route("/jobs",name="job_jobs")
     * @Method("POST")
     */
    public function getJobsAction(Request $request)
    {    
        $form = $this->getform($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData(); 
            $em = $this->getDoctrine()->getManager();
            $data['jobs'] = $em->getRepository(\JobPostBundle\Entity\JobDetails::class)->getRelatedJobs($data['skills']);
            return $this->render('job/default/post.html.twig',['data' => $data]);
        }
        return $this->redirectToRoute('job_index', [
                'request' => $request
            ], 307);
    }
    
    private function getform($request){
        $em = $this->getDoctrine()->getManager();
        $req = $em->getRepository(RequirementMaster::class)->findAll();
        $form = $this->createForm(UserType::class,null,['requirements'=>$req]);
        $form->handleRequest($request);
        return $form;
    }
}
